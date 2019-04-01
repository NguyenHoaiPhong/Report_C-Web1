<?php
/**
 * Created by PhpStorm.
 * User: Phong
 * Date: 2/26/2019
 * Time: 7:59 AM
 */

namespace App\Http\Controllers;

use App\Http\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;

class UserController extends Controller
{

    public function register(){
        return view('register');
    }
    public function postRegister(Request $request){

        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:users',
            'tel' => 'required|numeric',
            'password' => 'required|min:6',
            'name' => 'required',
        ],
            [
    //                'email.required'=>'email không được bỏ trống',
    //                'tel.required'=>'Phone không được bỏ trống',
    //                'password.required'=>'password không được bỏ trống',
    //                'name.required'=>'name không được bỏ trống',
            ]);
        if($validator->fails()){
            return redirect()->route('register')->withErrors($validator);
        }
        else{
            Users::insertUser($request->all());
            return redirect()->route('register')->with('success','Đăng ký thành công');
        }
    }

    public function editInfor(){
        $edtInfors = Users::getUser(Session::get('email'));
        return view('edit_infor', compact('edtInfors'));
    }

    public function post_editInfor(Request $request){

        $validator = Validator::make($request->all(), [
            'tel' => 'numeric',
        ]);

        if($validator->fails()){
            return redirect()->route('edt-inf')->withErrors($validator);
        }
        else{

            $user = Users::firstUser(Session::get('email'));

            if ($request->password == null ){
                $pass = $user->password;
            }
            else{
                $pass = $request->password;
            }

            if($request->name == null){
                $name = $user->user_first_name;
            }else{
                $name = $request->name;
            }

            if($request->tel == null){
                $tel = $user->user_phone;
            }else{
                $tel = $request->tel;
            }

            if($request->address == null){
                $address = $user->user_address;
            }else{
                $address = $request->address;
            }

            Users::updateUser($address,$tel,$pass,$name);

            return redirect()->route('edt-inf')->with('success','Cập nhật thành công');
        }
    }

    public function login(){
        return view('login');
    }

    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ],
            [
                'email.required' => 'Email là trường bắt buộc',
                'email.email' => 'Email không đúng định dạng',
                'password.required' => 'Mật khẩu là trường bắt buộc',
                'password.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
            ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $email = $request->input('email');
            $password = $request->input('password');

            $data = Users::firstUser($email);

            if ($data->user_status == 0){
                $minutes = round((time() - strtotime( $data->user_last_access))/60);
                if ($minutes <= 30) {
                    $errors = new MessageBag(['errorlogin' => 'Tài khoản đã bị khóa. Còn '. (30 - $minutes) . ' phút']);
                    return redirect()->back()->withInput()->withErrors($errors);
                }else{

                    Users::updateTime($email);
                    return redirect()->intended('/');
                }
            }else {
                if (Auth::attempt(['email' => $email, 'password' => $password])) {

                    Session::put('name', $data->user_first_name);
                    Session::put('email', $data->email);
                    Session::put('login', TRUE);

                    Users::updateTime($email);

                    return redirect()->intended('/');
                }else {

                    Users::countLoginFalse($email,$data->user_attempt);

                    if (($data->user_attempt)+1 > 3 )
                    {
                        Users::lockUser($email);
                        $errors = new MessageBag(['errorlogin' => 'Tài khoản đã bị khóa do nhập sai 3 lần']);
                        return redirect()->back()->withInput()->withErrors($errors);
                    }

                    $errors = new MessageBag(['errorlogin' => 'Email hoặc mật khẩu không đúng']);
                    return redirect()->back()->withInput($request->except('password'))->withErrors($errors);
                }

            }
        }
    }

    public function logout(){
        Auth::logout();
        Session::put('login', FALSE);
        return redirect()->route('log_in');
    }

}
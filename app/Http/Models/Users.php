<?php
/**
 * Created by PhpStorm.
 * User: Phong
 * Date: 2/26/2019
 * Time: 5:24 PM
 */

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class Users extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'user_id';

    public static function insertUser($data){

        Users::insert([
            'email'=>$data['email'],
            'user_phone'=>$data['tel'],
            'password'=>bcrypt($data['password']),
            'user_first_name'=>$data['name'],
            'user_status'=>1,
            'user_last_access'=>date('Y-m-d H:i:s'),
        ]);
    }

    public static function getUser($email){
        return Users::where('email', $email)->get();
    }

    public static function firstUser($email){
        return Users::where('email', $email)->first();
    }

    public static function updateUser($address, $tel, $pass, $name){
        Users::where('email', Session::get('email'))
            ->update([
                'user_address'=>$address,
                'user_phone'=>$tel,
                'password'=>bcrypt($pass),
                'user_first_name'=>$name,
            ]);
    }

    public static function updateTime($email){
        Users::where('email', $email)
            ->update(['user_last_access'=>date('Y-m-d H:i:s'),
                'user_attempt' => 0,
                'user_status' => 1]);
    }

    public static function lockUser($email){
        Users::where('email', $email)
            ->update(['user_status' => 0,
                'user_last_access'=>date('Y-m-d H:i:s'),]);
    }

    public static function countLoginFalse($email, $attempt){
        Users::where('email', $email)
            ->update(['user_attempt' => $attempt+1,
                'user_last_access'=>date('Y-m-d H:i:s'),]);
    }

}
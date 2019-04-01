<?php
/**
 * Created by PhpStorm.
 * User: phong
 * Date: 3/28/2019
 * Time: 9:11 AM
 */

namespace App\Http\Controllers;

use App\Http\Models\Airline;
use App\Http\Models\City;
use App\Http\Models\FlightList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateFlightController extends Controller
{
    public function flight_infor(){
        $cities = City::getCityJoinNation();
        $airlines = Airline::getAirline();
        return view('flight-infor', compact('cities', 'airlines'));
    }
    public function flight_create(Request $request){

        $validator = Validator::make($request->all(), [
            'from' => 'required',
            'total_person' => 'required|numeric',
            'to' => 'required',
            'air' => 'required',
            'code' => 'required',
            'departure' => 'required',
            'return_day' => 'required',
            'landing' => 'required',
            'flight_class' => 'required',
            'cost' => 'required|numeric',
        ],
            [
                'total_person.required'=>'Total person không được bỏ trống',
                'total_person.numeric'=>'Total person phải là số',
                'code.required'=>'Aieline code không được bỏ trống',
                'departure.required'=>'Departure không được bỏ trống',
                'return_day.required'=>'Return không được bỏ trống',
                'landing.required'=>'Landing không được bỏ trống',
                'cost.required'=>'Cost không được bỏ trống',
                'cost.numeric'=>'Cost person phải là số',
            ]);
        if($validator->fails()){
            return redirect()->route('flight_infor')->withErrors($validator)->withInput();
        }else{
            $city1 = $request->from;
            $city2 = $request->to;
            $air = $request->air;
            if ($city1 == $city2){
                return redirect()->route('flight_infor')->with('errorND','Nơi đi không được trùng với nơi đến');
            }else{
                if (FlightList::kiem_tra_bay_noi_dia($city1, $city2)){
                    if (FlightList::kiem_tra_hang_bay_noi_dia($city1, $city2, $air)){
                        FlightList::insertFL($request->all());
                        return redirect()->route('flight_infor')->with('success','Tạo chuyến nội địa thành công');
                    }else{
                        return redirect()->route('flight_infor')->with('errorND','Chuyến bay phải do quốc gia đó khai thác');
                    }
                }else if (FlightList::kiem_tra_bay_xuyen_quoc_gia($city1, $city2)){
                    FlightList::insertFL($request->all());
                    return redirect()->route('flight_infor')->with('success','Tạo chuyến xuyên quốc gia thành công');
                }else{
                    return redirect()->route('flight_infor')->with('errorND','Hai quốc gia không có liên kết');
                }
            }
        }
    }
}
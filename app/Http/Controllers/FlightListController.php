<?php
/**
 * Created by PhpStorm.
 * User: Phong
 * Date: 2/21/2019
 * Time: 11:01 AM
 */

namespace App\Http\Controllers;
use App\Http\Models\City;
use App\Http\Models\Flightbooking;
use App\Http\Models\FlightClass;
use App\Http\Models\FlightList;
use App\Http\Models\Transit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\MessageBag;


class FlightListController extends Controller
{
    public function flight_list(Request $request){

        $flightlist = FlightList::getAllFlightList($request->all());

        $countStansit = FlightList::countStansit();

        Session::put('fc_id', $request->flight_class);
        $citylists = City::get();

        if ($flightlist->fl_total < $request->total_person)
        {
            $errors = new MessageBag(['errorTotal' => 'Số lượng bạn đặt vượt quá số ghế còn lại. Chỉ còn lại ' . $flightlist->fl_total . ' ghế']);
            return redirect()->back()->withInput()->withErrors($errors);
        }else{
            FlightList::updateTotalPerson($request->all(), $flightlist->fl_total);
        }

        $cost = FlightList::getCost();

        return view('flight-list', compact('flightlist', 'citylists', 'countStansit', 'cost'));
    }


}
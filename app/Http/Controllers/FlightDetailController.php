<?php
/**
 * Created by PhpStorm.
 * User: Phong
 * Date: 2/21/2019
 * Time: 2:23 PM
 */

namespace App\Http\Controllers;


use App\Http\Models\City;
use App\Http\Models\FlightClass;
use App\Http\Models\FlightList;
use App\Http\Models\Transit;
use Illuminate\Http\Request;

class FlightDetailController
{
    public function flight_detail($fl_id){

        $flightdetails = FlightList::getFlightListByID($fl_id);

        $countStansit = FlightList::countStansit();

        $citylists = City::getCityJoinAirport();

        $flightclasses = FlightClass::getAllFC();

        $transits = Transit::getTransitByFL_ID($fl_id);

        $cost = FlightList::getCost();

        return view('flight-detail', compact('flightdetails', 'citylists', 'flightclasses', 'transits', 'countStansit', 'cost'));
    }
}
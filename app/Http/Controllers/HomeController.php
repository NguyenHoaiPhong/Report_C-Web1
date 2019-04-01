<?php

namespace App\Http\Controllers;

use App\Http\Models\City;
use App\Http\Models\Flightbooking;
use App\Http\Models\FlightClass;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//       $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all();
        $flight_classes = FlightClass::all();
        return view('index', compact('cities','flight_classes') );
    }


}
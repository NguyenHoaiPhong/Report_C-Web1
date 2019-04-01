<?php
/**
 * Created by PhpStorm.
 * User: Phong
 * Date: 3/6/2019
 * Time: 7:50 AM
 */

namespace App\Http\Controllers;


use App\Http\Models\Airport;
use App\Http\Models\City;

class CityController extends Controller
{
    public function index(){
        $citylists = City::get();
        $airports = Airport::get();
        return view('city-list', compact('citylists','airports') );
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Phong
 * Date: 2/26/2019
 * Time: 9:00 PM
 */

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlightBookController extends Controller
{
    public function flight_book(Request $request){

        return view('flight-book');
    }
}
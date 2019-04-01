<?php
/**
 * Created by PhpStorm.
 * User: Phong
 * Date: 3/6/2019
 * Time: 7:53 AM
 */

namespace App\Http\Controllers;


use App\Http\Models\Airline;
use App\Http\Models\Nation;
use Illuminate\Support\Facades\DB;

class AirlineController extends Controller
{
    public function index(){

        $nations = Nation::all();
        $airlines = Airline::all();

        return view('airline-list', compact('nations', 'airlines'));
    }
}
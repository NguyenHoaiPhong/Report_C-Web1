<?php
/**
 * Created by PhpStorm.
 * User: Phong
 * Date: 3/4/2019
 * Time: 1:34 PM
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class FlightClass extends Model
{
    protected $table = 'flight_classes';
    protected $primaryKey = 'fc_id';

    public static function getAllFC(){
        return FlightClass::all();
    }
}
<?php
/**
 * Created by PhpStorm.
 * User: Phong
 * Date: 3/6/2019
 * Time: 8:39 AM
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class Airline extends Model
{
    protected $table = 'airlines';
    protected $primaryKey = 'airline_id';

    public static function getAirline(){
        return Airline::all();
    }
}
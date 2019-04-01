<?php
namespace App\Http\Models;
use Illuminate\Database\Eloquent\Model;
class City extends Model{
    protected $table = 'cities';
    protected $primaryKey = 'city_id';

    public static function getCityJoinAirport(){
        return City::join('airports', 'cities.city_airport_id', '=', 'airports.airport_id')->get();
    }

    public static function getCityJoinNation(){
        return City::join('nations', 'cities.city_nation_id', '=', 'nations.nation_id')->get();
    }


}
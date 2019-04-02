<?php
/**
 * Created by PhpStorm.
 * User: Phong
 * Date: 2/21/2019
 * Time: 11:15 AM
 */
namespace App\Http\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;

class FlightList extends Model{
    protected $table = 'flight_list';
    protected $primaryKey = 'fl_id';

    public static function getAllFlightList($data){
        return FlightList::where([
            ['fl_city_from_id', $data['from']],
            ['fl_city_to_id', $data['to']],
            ['fl_departure_date', '>=', $data['departure']],
        ])
            ->join('airlines', 'flight_list.fl_airline_id', '=', 'airlines.airline_id')
            ->first();
        Session::put('form_departure', $data['departure']);
		
    }

    public static function updateTotalPerson($data, $total){
        FlightList::where([
            ['fl_city_from_id', $data['from']],
            ['fl_city_to_id', $data['to']],
            ['fl_departure_date', '>=', $data['departure']],
        ])
            ->update(['fl_total' => ($total - $data['total_person']), ]);
    }


    public static function getFlightListByID($fl_id){
        return FlightList::where('fl_id', '=', $fl_id)
            ->join('airlines', 'flight_list.fl_airline_id', '=', 'airlines.airline_id')
            ->join('flight_classes', 'flight_list.fl_fc_id', '=', 'flight_classes.fc_id')
            ->get();
    }

    public static function countStansit(){
        return DB::table('flight_list')
            ->join('transits', 'transits.transit_fl_id', '=', 'flight_list.fl_id')
            ->select(DB::raw('COUNT(transits.transit_fl_id) as Num'), 'transits.transit_fl_id')
            ->groupBy('transits.transit_fl_id')
            ->get();

    }

    public static function insertFL($data){
        FlightList::insert([
            'fl_fc_id'=>$data['flight_class'],
            'fl_airline_id'=>$data['air'],
            'fl_code'=>$data['code'],
            'fl_total'=>$data['total_person'],
            'fl_km'=>$data['km'],
            'fl_city_from_id'=>$data['from'],
            'fl_city_to_id'=>$data['to'],
            'fl_departure_date'=>$data['departure'],
            'fl_return_date'=>$data['return_day'],
            'fl_landing_date'=>$data['landing'],
        ]);
    }

    public static function kiem_tra_bay_noi_dia($city1, $city2){
        $city1 = City::find($city1);
        $city2 = City::find($city2);

        if ($city1->city_nation_id == $city2->city_nation_id){
            return true;
        }
        return false;
    }
    public static function kiem_tra_hang_bay_noi_dia($city1, $city2, $airline_id){
        $city1 = City::find($city1);
        $city2 = City::find($city2);

        $nation_airline_id = Airline::find($airline_id)->airline_nation_id;

        if ($city1->city_nation_id == $city2->city_nation_id && $city1->city_nation_id == $nation_airline_id){
            return true;
        }
        return false;
    }

    public static function kiem_tra_bay_xuyen_quoc_gia($city1, $city2){
        $city1 = City::find($city1);
        $city2 = City::find($city2);

        $nation1 = $city1->city_nation_id;
        $nation2 = $city2->city_nation_id;

        $country = Nation::find($nation1)->country_id;

        $country_arr = explode(',', $country);

        if (in_array($nation2, $country_arr)){
            return true;
        }
        return false;
    }

    public static function getCost() {
        $flightlists = FlightList::all();
        //calculate cost
        $fdepart = strtotime(Session::get('form_departure'));

        foreach ($flightlists as $flightlist)
            $departure = strtotime($flightlist->fl_departure_date);
            $f = $flightlist->fl_km;

        $cost = 0;
        $totals = 0;

        $s = abs($departure - $fdepart);
        $d = abs(round($s / 86400));

        if (0 <= $f && $f <= 100) {
            $cost = 500000;
        } else if (101 <= $f && $f <= 200) {
            $cost = 1000000;
        } else if (201 <= $f && $f <= 500) {
            $cost = 2000000;
        } else if (501 <= $f && $f <= 1000) {
            $cost = 3000000;
        } else if (1001 <= $f && $f <= 2000) {
            $cost = 6000000;
        } else if (2001 <= $f && $f <= 5000) {
            $cost = 20000000;
        } else if ($f >= 5001) {
            $cost = 30000000;
        } else {
            return $cost;
        }

        if ($d >= 60) {
            $totals = $cost - ($cost * 0.1);
        } else if ($d >= 30) {
            $totals = $cost - ($cost * 0.05);
        } else if ($d >= 14) {
            $totals = $cost + ($cost * 0.1);
        } else if ($d >= 7) {
            $totals = $cost + ($cost * 0.2);
        } else if ($d >= 1) {
            $totals = $cost + ($cost * 0.5);
        } else {
            return -1;
        }

        return $totals;
    }



//$transits = DB::table('flight_list')
//->join('transits', 'transits.transit_fl_id', '=', 'flight_list.fl_id')
//->select(DB::raw('COUNT(transits.transit_fl_id) as count'), 'transits.transit_fl_id')
//->groupBy('transits.transit_fl_id')
//->get();

}
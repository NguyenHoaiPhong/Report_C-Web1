<?php
/**
 * Created by PhpStorm.
 * User: Phong
 * Date: 3/7/2019
 * Time: 2:16 PM
 */

namespace App\Http\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Transit extends Model
{
    protected $table = 'transits';
    protected $primaryKey = 'transit_id';

    public static function getTransitByFL_ID($fl_id){
        return Transit::Where('transit_fl_id', '=', $fl_id)
            ->join('flight_list', 'transits.transit_fl_id', '=', 'flight_list.fl_id')
            ->get();
    }



//SELECT COUNT(transits.transit_id) as Num, transits.transit_fl_id
//FROM transits
//INNER JOIN flight_list
//ON flight_list.fl_id = transits.transit_fl_id
//GROUP BY transits.transit_fl_id

}
<?php
/**
 * Created by PhpStorm.
 * User: Phong
 * Date: 3/6/2019
 * Time: 8:30 AM
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nation extends Model
{
    protected $table = 'nations';
    protected $primaryKey = 'nation_id';

    public static function getNatio(){
        return Nation::all();
    }
}
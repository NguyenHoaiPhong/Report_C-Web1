<?php
/**
 * Created by PhpStorm.
 * User: Phong
 * Date: 3/6/2019
 * Time: 9:16 AM
 */

namespace App\Http\Models;


use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $table = 'airports';
    protected $primaryKey = 'airport_id';
}
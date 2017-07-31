<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PositionLevel extends Model
{
    protected $fillable = ['id','name'];
    protected $table='position_levels';
    public $timestamps = false;
}

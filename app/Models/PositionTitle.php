<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PositionTitle extends Model
{
     protected $fillable = ['id','name'];
    protected $table='position_titles';
    public $timestamps = false;
}

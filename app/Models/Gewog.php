<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gewog extends Model
{
    protected $table='gewogs';
    protected $fillable = ['code','name','dzongkhag_id'];
    public $timestamps = false;
}

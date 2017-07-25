<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    protected $fillable = ['id','name'];
    public $timestamps = false;
    public function teacher() {

    	return $this->belongsTo('App\Teacher');
    }
}

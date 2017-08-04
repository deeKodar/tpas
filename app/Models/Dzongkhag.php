<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dzongkhag extends Model
{
    protected $table = 'dzongkhags';
    protected $fillable = ['id', 'name',];
    public $timestamps = false;

//    public function school() {
//        $this->belongsTo('App\Models\School', 'dzongkhag_id');
//    }
}

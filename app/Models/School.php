<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{



    protected $fillable = ['name','school_level_id','dzongkhag_id','school_status_type_id','user_id','version'];



    public function dzongkhag() {

        return $this->hasOne('App\Models\Dzongkhag','id');
    }



}

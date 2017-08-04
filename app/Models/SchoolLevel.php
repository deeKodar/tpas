<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolLevel extends Model
{
    protected $table = 'school_levels';
    protected $primaryKey = 'id';
    public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['name'];

//    public function school() {
//        $this->belongsTo('App\Models\School', 'school_level_id');
//    }


}

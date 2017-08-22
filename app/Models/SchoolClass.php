<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    protected $table = 'school_classes';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['name', 'created_at', 'updated_at'];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */
//    public function subjects()
//    {
//        return $this->hasMany('App\Models\Subject', 'subject_school_class');
//    }
     public function subjects()
     {
         return $this->belongsToMany('App\Models\Subject', 'subject_school_class')->withTimestamps();
     }

//    public function schoolLevels()
//    {
//        return $this->belongsToMany('App\Models\SchoolLevel', 'class_level');
//    }

}

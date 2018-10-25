<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Subject;

class SchoolClass extends Model
{
    protected $table = 'school_classes';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['id','name'];

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

    public function hasSubject($id) {

        return $this->subjects->contains('id',$id);

    }
     public function subjects()
     {
         return $this->belongsToMany('App\Models\Subject', 'school_class_subject')->withTimestamps();
        //return $this->belongsToMany(Subject::class);
     }

//    public function schoolLevels()
//    {
//        return $this->belongsToMany('App\Models\SchoolLevel', 'class_level');
//    }

}

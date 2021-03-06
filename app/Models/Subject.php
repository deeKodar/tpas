<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\SchoolClass;

class Subject extends Model
{
    protected $table = 'subjects';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $guarded = ['id'];
    protected $fillable = ['name', 'subject_type_id', 'create_at', 'updated_at'];
    // protected $hidden = [];
    // protected $dates = [];

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

    public function subjectType()
    {
        return $this->belongsTo('App\Models\SubjectType', 'subject_type_id');
    }

    public function hasClass($class_id) {

       foreach($class_id as $c) {
            if($this->schoolClasses->contains('id',$c->school_class_id)) {

                return true;
            }


       }



        // if(is_string($class_id)) {

        //     return $this->schoolClasses->contains('id',$class);
        // }

        // foreach($class_id as $c) {

        //     if($this->hasClass($c->id)) {

        //         return true;
        //     }
        // }


    }

    public function schoolClasses()
    {
         //return $this->belongsToMany('App\Models\SchoolClass', 'subject_school_class')->withTimestamps();
         return $this->belongsToMany('App\Models\SchoolClass', 'school_class_subject')->withTimestamps();
//return $this->belongsToMany(SchoolClass::class);
    }

}

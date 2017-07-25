<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
     protected $fillable = ['employee_id','citizenship_id','first_name','middle_name','last_name','citizenship','gender','date_of_birth','position_level','position_title','employment_type_id','initial_appointment_date','current_appointment_date','qualification_id','field_of_study_id','school_id','class_id','core_subject_id','elective_subject_one_id','elective_subject_two_id','elective_subject_three_id','employee_status_type_id','marital_status','user_id','version'];

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    //protected $table = 'teachers';
    //protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    // protected $fillable = [];
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
    public function school() {

        return $this->hasOne('App\School','id');
    }
    public function classType() {
        return $this->hasOne('App\ClassType','id');
    }
    public function teacherEmploymentType() {

        return $this->hasOne('App\TeacherEmploymentType','id');
    }
    public function qualification() {
        return $this->hasOne('App\Qualification','id');
    }
    public function fieldOfStudy() {

        return $this->hasOne('App\FieldOfStudy','id');
    }
    public function teacherStatusType() {

        return $this->hasOne('App\TeacherStatusType','id');
    }
}

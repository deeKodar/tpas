<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\School;

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
    public function getSchool($teacherid){

        $schools = DB::table('teachers')
            ->leftJoin('schools', 'schools.id', '=', 'teachers.school_id')
            ->select('schools.name')
            ->where('teachers.id', '=', $teacherid)
            ->get();
    }

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function school() {

        return $this->belongsTo(School::class);
        //return $this->belongsTo('App\Models\School','id');
    }
    public function classType() {
        return $this->hasOne('App\Models\ClassType','id');
    }
    public function teacherEmploymentType() {

        return $this->hasOne('App\Models\TeacherEmploymentType','id');
    }
    public function qualification() {
        return $this->hasOne('App\Models\Qualification','id');
    }
    public function fieldOfStudy() {

        return $this->hasOne('App\Models\FieldOfStudy','id');
    }
    public function teacherStatusType() {

        return $this->hasOne('App\Models\TeacherStatusType','id');
    }


}

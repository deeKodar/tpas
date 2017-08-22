<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\School;
use App\Models\Dzongkhag;

class Teacher extends Model
{
     protected $fillable = ['employee_id','name','gender','date_of_birth','position_level','position_title','employment_type_id','initial_appointment_date','current_appointment_date','initial_qualification_id','current_qualification_id','field_of_study_id','school_id','core_subject_id','subject_one_id','subject_two_id','subject_three_id','employee_status_type_id','marital_status','remarks','contract_from','contract_to','user_id','version'];

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

    public function dzongkhag() {

        return $this->belongsTo(Dzongkhag::class);
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

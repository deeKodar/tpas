<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\School;
use App\Models\Dzongkhag;
use App\Models\TeacherStatusType;
use App\Models\FieldOfStudy;
use App\Models\ClassType;
use App\Models\TeacherEmploymentType;
use App\Models\Qualification;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
     use SoftDeletes;

     protected $fillable = ['employee_id','name','gender','date_of_birth','position_level','position_title','employment_type_id','initial_appointment_date','current_appointment_date','initial_qualification_id','current_qualification_id','field_of_study_id','school_id','core_subject_id','subject_one_id','subject_two_id','subject_three_id','teacher_status_type_id','marital_status','remarks','contract_from','contract_to','user_id','version'];



    protected $dates = ['deleted_at'];

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
        return $this->belongsTo(ClassType::class);
    }

    public function teacherEmploymentType() {

        return $this->belongsTo(TeacherEmploymentType::class);
    }

    public function qualification() {
        return $this->belongsTo(Qualification::class);
    }

    public function fieldOfStudy() {

        return $this->belongsTo(FieldOfStudy::class);
    }

    public function teacherStatusType() {

        return $this->belongsTo(TeacherStatusType::class);
    }


}

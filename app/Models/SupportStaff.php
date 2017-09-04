<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportStaff extends Model
{
    use SoftDeletes;

     protected $fillable = ['employee_id','name','gender','date_of_birth','position_level','position_title','employment_type_id','initial_appointment_date','current_appointment_date','qualification_id','field_of_study_id','school_id','teacher_status_type_id','marital_status','user_id','version'];



    protected $dates = ['deleted_at'];

    public function school() {

        return $this->belongsTo(School::class);
        //return $this->belongsTo('App\Models\School','id');
        
    }

    public function dzongkhag() {

        return $this->belongsTo(Dzongkhag::class);
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

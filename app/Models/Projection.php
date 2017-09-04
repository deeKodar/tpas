<?php

namespace App\Models;


use App\Models\School;
use App\Models\Dzongkhag;
use App\Models\Subject;
use App\Models\ProjectionType;
use Illuminate\Database\Eloquent\Model;

class Projection extends Model
{
    protected $fillable = ['school_id','subject_id','actual_teachers','required_teachers','teacher_gap','curriculum_year','projection_type_id'];

    public function school() {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function dzongkhag() {
        return $this->belongsTo(Dzongkhag::class, 'dzongkhag_id');
    }

    public function subject() {


    	return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function projectionType() {
        return $this->belongsTo(ProjectionType::class, 'projection_type_id');
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassProjection extends Model
{
    protected $table = 'class_projections';
    protected $primaryKey = 'id';

    protected $fillable = ['dzongkhag_id', 'school_id', 'school_class_id', 'student_count', 'section_count', 'curriculum_year', 'projection_type_id','user_id', 'created_at', 'updated_at', 'version'];

    public function school() {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function dzongkhag() {
        return $this->belongsTo(Dzongkhag::class, 'dzongkhag_id');
    }

    public function schoolClass() {
        return $this->belongsTo(SchoolClass::class, 'school_class_id');
    }

    public function projectionType() {
        return $this->belongsTo(ProjectionType::class, 'projection_type_id');
    }

   
}

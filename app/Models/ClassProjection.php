<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ClassProjection extends Model
{
    protected $table = 'class_projections';
    protected $primaryKey = 'id';

    protected $fillable = ['school_id', 'school_class_id', 'student_count', 'curriculum_year', 'projection_type_id','user_id', 'created_at', 'updated_at', 'version'];

    public function school() {
        return $this->belongsTo(School::class, 'school_id');
    }

    public function class() {
        return $this->belongsTo(SchoolClass::class, 'school_class_id');
    }

    public function projectionType() {
        $this->belongsTo(ProjectionType::class, 'projection_type_id');
    }
}

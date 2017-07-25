<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StandardSubjectHour extends Model
{
    protected $table = 'standard_subject_hours';
    protected $primaryKey = 'id';
    public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['subject_school_class_id', 'standard_hour', 'standard_minute'];


     public function subjectSchoolClass()
    {
        return $this->belongsTo('App\Models\SubjectSchoolClass', 'id');
    }

}

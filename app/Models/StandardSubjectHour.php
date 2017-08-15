<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StandardSubjectHour extends Model
{
    protected $table = 'standard_subject_hours';
    protected $primaryKey = 'id';
    public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['school_class_id', 'subject_id', 'standard_hour', 'standard_minute'];


     public function schoolClass()
    {
        return $this->belongsTo('App\Models\SchoolClass', 'school_class_id');
    }

    public function subject()
    {
        return $this->belongsTo('App\Models\Subject', 'subject_id');
    }

}

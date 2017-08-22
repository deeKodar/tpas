<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectSchoolClass extends Model
{
    protected $table = 'subject_school_class';
    protected $primaryKey = 'id';
    public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['subject_id', 'school_class_id', 'created_at', 'updated_at'];
}

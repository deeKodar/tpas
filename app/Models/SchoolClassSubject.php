<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolClassSubject extends Model
{
    protected $table = 'school_class_subject';
    protected $primaryKey = 'id';
    public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['subject_id', 'school_class_id', 'created_at', 'updated_at'];
}

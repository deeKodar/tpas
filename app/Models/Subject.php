<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table = 'subjects';
    protected $primaryKey = 'id';
    public $timestamps = true;
    // protected $guarded = ['id'];
    protected $fillable = ['name', 'subject_type_id', 'create_at', 'updated_at'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function subjectType()
    {
        return $this->belongsTo('App\Models\SubjectType', 'subject_type_id');
    }

    public function schoolClasses()
    {
        return $this->belongsToMany('App\Models\SchoolClass', 'subject_school_class')->withTimestamps();
    }

}

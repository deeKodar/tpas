<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherEmploymentType extends Model
{
    protected $table='teacher_employment_types';
    protected $fillable = ['name'];
    public $timestamps = false;
    public function teacher() {

    	return $this->belongsTo('App\Teacher');
    }
}

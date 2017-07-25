<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeacherStatusType extends Model
{
    protected $table = 'teacher_status_types';
    protected $fillable = ['id','name'];
    public $timestamps = false;

    public function teacher() {

    	return $this->belongsTo('App\Teacher');
    }
}

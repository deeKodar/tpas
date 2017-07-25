<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolStatusType extends Model
{
    protected $table = 'school_status_types';
    protected $fillable = ['id','name'];
    public $timestamps = false;
}

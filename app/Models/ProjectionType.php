<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProjectionType extends Model
{
    protected $table = 'projection_types';
    protected $fillable = ['id','name'];
    public $timestamps = false;
}

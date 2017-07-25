<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class SubjectType extends Model
{
    
    protected $table = 'subject_types';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['name'];

     public function subjects()
    {
        return $this->hasMany('App\Models\Subject');
    }
}

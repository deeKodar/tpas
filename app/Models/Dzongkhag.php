<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dzongkhag extends Model
{
     protected $table = 'dzongkhags';
    protected $fillable = ['code', 'name',];
    public $timestamps = false;
}

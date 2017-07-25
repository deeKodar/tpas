<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransferGround extends Model
{
      protected $table = 'transfer_grounds';
    protected $fillable = ['id','name',];
    public $timestamps = false;
}

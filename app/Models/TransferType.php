<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransferType extends Model
{
    protected $table = 'transfer_types';
    protected $fillable = ['id','name'];
    public $timestamps = false;
}

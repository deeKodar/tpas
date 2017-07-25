<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransferStage extends Model
{
    protected $table = 'transfer_stages';
    protected $fillable = ['id','name'];
    public $timestamps = false;
}

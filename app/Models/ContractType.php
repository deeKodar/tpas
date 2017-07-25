<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContractType extends Model
{
    protected $table = 'contract_types';
    protected $fillable = ['id','name'];
    public $timestamps = false;
}

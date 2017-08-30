<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Dzongkhag extends Model
{
    protected $table = 'dzongkhags';
    protected $fillable = ['id', 'name',];
    public $timestamps = false;

//    public function school() {
//        $this->belongsTo('App\Models\School', 'dzongkhag_id');
//    }

public function user() {
	$this->belongsTo(User::class);
}
    
}

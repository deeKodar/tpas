<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Role;

class Permission extends Model
{
	protected $fillable = ['id','name','label'];
	public $timestamps=false;
	
	public function roles() {

		return $this->belongsToMany(Role::class);
	}
    
    
}
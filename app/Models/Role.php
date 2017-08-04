<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $fillable= ['id','name','label'];
	public $timestamps = false;
	
    public function permissions() {

    	return $this->belongsToMany(Permission::class);
    }

    public function givePermissionTo(Permission $permission) {


    	return $this->permissions()->save($permission);
    }
    
}

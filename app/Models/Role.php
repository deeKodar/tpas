<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
	protected $table='roles';
	protected $primaryKey = 'id';
	protected $fillable= ['id','name','label'];
	public $timestamps = false;

	public function users()
{
    return $this->hasMany('App\Models\User');
}
	
    public function permissions() {

    	return $this->belongsToMany(Permission::class);
    }

    public function givePermissionTo(Permission $permission) {


    	return $this->permissions()->save($permission);
    }
    
}

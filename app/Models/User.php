<?php

namespace App\Models;


use Illuminate\Notifications\Notifiable;
use App\Models\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable;
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role() {

        return $this->belongsTo(Role::class);
    }

    public function hasRole($role) {

        if(is_string($role)) {
            return $this->role->contains('name',$role);
        }

        return !! $role->intersect($this->role)->count();
        // foreach ($role as $r) {
        //     if ($this->hasRole($role->name)) {

        //         retur true;
        //     }
        // }


    }

    
}

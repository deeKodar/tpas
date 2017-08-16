<?php

namespace App\Models;


use Illuminate\Notifications\Notifiable;
use App\Models\Role;
use App\Models\Dzongkhag;
use App\Models\School;
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

        return $this->belongsTo('App\Models\Role', 'role_id');

    }

    public function hasRole($role) {

        if(is_string($role)) {
           //return $this->role->contains('name',$role);
            return $this->role->name==$role;
        }


        //return !! $role->intersect($this->role)->count();

        foreach ($role as $r) {
            if ($this->hasRole($r->name)) {

                return true;
            }
            
                
        }
        return false;


    }

    public function dzongkhag() {

        return $this->hasOne(Dzongkhag::class);
    }

    public function school() {
        return $this->hasOne(School::class);
    }
    
}

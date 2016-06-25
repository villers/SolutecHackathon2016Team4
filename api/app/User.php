<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // The attributes that are mass assignable.

    protected $fillable = [
<<<<<<< HEAD
    'type', 'points', 'last_name', 'first_name','login','email','password','country','city','postal_code','adresse_number','adress','is_active','token_active','graduation','lang','can_drive',
=======
        'login', 'email', 'password', 'first_name', 'last_name', 'country', 'city', 'postal_code', 'address_number', 'address', 'type', 'is_active', 'token_active',
>>>>>>> 7a08798dd8f69906f789342760434158de9d77bd
    ];

    // The attributes that should be hidden for arrays.

    protected $hidden = [
    'password',
    ];

    public function notifications()
    {
        return $this->hasMany('App\Notification');
    }

    public function jobs()
    {
        return $this->hasMany('App\Job');
    }
}

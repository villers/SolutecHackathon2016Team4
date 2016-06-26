<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    // The attributes that are mass assignable.
    protected $fillable = [
    'type', 'points', 'last_name', 'first_name', 'login', 'email', 'password', 'country',
    'city', 'postal_code', 'adresse_number', 'adress', 'is_active', 'token_active', 'graduation',
    'lang', 'can_drive', 'phone_number', 'picture'
    ];

    protected $hidden = [
    'password',
    ];

    /**
     * Has Many Notifications
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notifications()
    {
        return $this->hasMany('App\Notification');
    }

    /**
     * Has Many Jobs
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobs()
    {
        return $this->hasMany('App\Job');
    }

    public function achievements()
    {
        return $this->belongsToMany('App\Achievement')
        ->withPivot('has_read')
        ->withTimestamps();
    }

    public function purposes()
    {
        return $this->hasMany('App\Purpose');
    }

    public function votes()
    {
        return $this->hasMany('App\Vote');
    }
}

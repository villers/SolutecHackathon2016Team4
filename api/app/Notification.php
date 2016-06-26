<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    // The attributes that are mass assignable.
    protected $fillable = ['user_id', 'has_read', 'message'];

    // The attributes that should be hidden for arrays.
    protected $hidden = [];

    /**
     * Belongs To Users
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
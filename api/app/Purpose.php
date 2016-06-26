<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
    // The attributes that are mass assignable.
	protected $fillable = ['from_user_id', 'to_user_id', 'message'];

    // The attributes that should be hidden for arrays.
	protected $hidden = [];
}

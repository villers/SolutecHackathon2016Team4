<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
	protected $fillable = [
	'message', 'points', 'icon', ];

    // The attributes that should be hidden for arrays.

	protected $hidden = [];
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // The attributes that are mass assignable.

	protected $fillable = [
	'name',
	];

    // The attributes that should be hidden for arrays.

	protected $hidden = [];

	public function jobs()
	{
		return $this->belongsTo('App\Job');
	}
}
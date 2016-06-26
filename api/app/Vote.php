<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
   	 // The attributes that are mass assignable.
	protected $fillable = ['from_user_id', 'to_user_id', 'note'];

    // The attributes that should be hidden for arrays.
	protected $hidden = [];
	
	public function user()
	{
		return $this->belongsTo('App\User', 'to_user_id');
	}
}

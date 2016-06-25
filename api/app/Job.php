<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
     // The attributes that are mass assignable.

     protected $fillable = [
     'user_id', 'category_id', 'country', 'city','postal_code','entreprise_desc','message','lang','graduation','salary','name',
     ];

     // The attributes that should be hidden for arrays.
    
    protected $hidden = [];


	public function category()
	{
		return $this->hasOne('App\Categories');
	}

}
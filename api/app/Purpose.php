<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
    // The attributes that are mass assignable.
	protected $fillable = ['from_user_id', 'to_user_id', 'message'];

    // The attributes that should be hidden for arrays.
	protected $hidden = [];

	public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function allForMe() {
        return self::whereAs('', function() {

        });
    }

    public static function allForId() {
        
    }
}

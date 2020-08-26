<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
	//
	//protected $table = 'genres';
	//protected $primaryKey = 'id';
	use SoftDeletes;

	public function movies()
	{
		//return $this->hasMany('App\Movie', 'genre_id', 'id');
		return $this->hasMany('App\Movie');
	}
}

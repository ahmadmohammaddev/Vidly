<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
	public function actors()
	{
		return $this->belongsToMany('App\Actor', 'movies_actors_relationship', 'movie_id', 'actor_id');
	}
}

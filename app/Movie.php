<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{


	protected $fillable = ["title", "description", "genre_id", "number_in_stock", "daily_rental_rate"];

	public function genre()
	{
		return $this->belongsTo('App\Genre');
	}

	public function actors()
	{
		return $this->belongsToMany('App\Actor', 'movies_actors_relationship', 'movie_id', 'actor_id');
	}
}

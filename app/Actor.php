<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $fillable = ["first_name", "last_name", "DOB", "address"];

    public function movies()
    {
        return $this->belongsToMany('App\Movie', 'movies_actors_relationship', 'actor_id', 'movie_id');
    }
}

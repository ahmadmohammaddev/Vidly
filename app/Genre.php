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
}

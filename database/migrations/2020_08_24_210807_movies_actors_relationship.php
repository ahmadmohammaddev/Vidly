<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MoviesActorsRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies_actors_relationship', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('movie_id')->references('id')->on('movies');
            $table->unsignedBigInteger('actor_id')->references('id')->on('actors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies_actors_relationship');
    }
}

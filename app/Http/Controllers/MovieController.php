<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Movie;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $title = $request->movie_title;
            $description = $request->description;
            $number_in_stock = $request->number_in_stock;
            $daily_rental_rate = $request->daily_rental_rate;
            $genre_id = $request->genre_id;

            $movieID = DB::table('movies')->insertGetId([
                'title' => $title,
                'description' => $description,
                'number_in_stock' => $number_in_stock,
                'daily_rental_rate' => $daily_rental_rate,
                'genre_id' => $genre_id
            ]);

            $actor1 = $request->main_actor_1;
            $actor2 = $request->main_actor_2;
            $actor3 = $request->main_actor_3;

            $actors_names = [$actor1, $actor2, $actor3];
            $actors = array_fill(0, 3, null);

            $index = 0;

            foreach ($actors_names as $name) {
                if ($name != null) {
                    $actors[$index] = DB::table("actors")
                        ->where("first_name", $name)
                        ->select("id")
                        ->first();
                }
                $index++;
            }

            foreach ($actors as $actor) {
                if ($actor != null) {
                    DB::table('movies_actors_relationship')->insert([
                        'movie_id' => $movieID,
                        'actor_id' => $actor->id
                    ]);
                }
            }
        });
        $genre_id = $request->genre_id;
        return redirect('genre/' . $genre_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $title = $request->movie_title;
        $description = $request->description;
        $number_in_stock = $request->number_in_stock;
        $daily_rental_rate = $request->daily_rental_rate;
        $genre_id = $request->genre_id;

        DB::table('movies')
            ->where("id", $id)
            ->update([
                'title' => $title,
                'description' => $description,
                'number_in_stock' => $number_in_stock,
                'daily_rental_rate' => $daily_rental_rate
            ]);

        return redirect('genre/' . $genre_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $genre_id = $request->genre_id;
        DB::table('movies')->where('id', $id)->delete();
        return redirect('genre/' . $genre_id);
    }

    public function summary()
    {
        $results = Movie::with('genre')->with('actors')->get();
        return view('moviesViewsContainer.summary', compact('results', $results));
    }
}

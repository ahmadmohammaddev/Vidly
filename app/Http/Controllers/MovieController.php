<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        //
        $title = $request->movie_title;
        $description = $request->description;
        $number_in_stock = $request->number_in_stock;
        $daily_rental_rate = $request->daily_rental_rate;
        $genre_id = $request->genre_id;

        DB::table('movies')->insert([
            'title' => $title,
            'description' => $description,
            'number_in_stock' => $number_in_stock,
            'daily_rental_rate' => $daily_rental_rate,
            'genre_id' => $genre_id
        ]);

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
    public function destroy($id)
    {
        //
    }
}

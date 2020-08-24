<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GenreResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $date = date('Y-m-d');
        $time = date('H:i:s');

        //i can use the compact method to create an array of variables
        // so i can pass valuew to the view in this way
        //return view('moviesViewsContainer.movies', compact('date', 'time'));

        $arrayOfObject = ['date' => $date, 'time' => $time];

        // And i can use the with method
        //return view('moviesViewsContainer.movies')->with('date' ,$date)->with('time',$time);
        //return view('moviesViewsContainer.movies')->withDate($date)->withTime($time);

        return view('moviesViewsContainer.movies', $arrayOfObject);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return '<center><h1>Creating new genre (form for entering the name of genre )</h1></center>';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // storing the new created genre to the db.
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return '<center><h1>This page is for ' . $id .  ' genre</h1></center>';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return '<center><h1>The form for editing ' . $id .  ' genre</h1></center>';
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
        //saving the edited genre to the db.
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //deLete the genre with id = $id from db with ther movies
    }
}

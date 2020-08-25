<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Genre;

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

        //$arrayOfObject = ['date' => $date, 'time' => $time];

        // And i can use the with method
        //return view('moviesViewsContainer.movies')->with('date' ,$date)->with('time',$time);
        //return view('moviesViewsContainer.movies')->withDate($date)->withTime($time);

        // $genres = ['action' => 'dragon2.jpg', 'comedy' => 'monsters.jpg'];

        //$genres = DB::table('genres')->get();

        $genres = Genre::all();

        return view('moviesViewsContainer.movies')->with('genres', $genres);
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
        $genre_name = $request->input('genre_name');
        $file = $request->file('image');
        $destinationPath = 'images';

        $filename = $file->getClientOriginalName();
        $file->move($destinationPath, $filename);
        //DB::table('genres')->insert(['name' => $genre_name, 'image_name' => $filename]);
        //Genre::insert(['name' => $genre_name, 'image_name' => $filename]);
        $genre = new Genre;

        $genre->name = $genre_name;
        $genre->image_name = $filename;

        $genre->save();

        return redirect('admin');
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
        $genre_name = $request->input('genre_name');
        //DB::table('genres')->where('id', $id)->update(['name' => $genre_name]);
        //Genre::table('genres')->where('id', $id)->update(['name' => $genre_name]);

        $genre = Genre::find($id);

        $genre->name = $genre_name;

        $genre->save();

        return redirect('admin');
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
        // DB::table('genres')->where('id', $id)->delete();

        // Genre::table('genres')->where('id', $id)->delete();

        // $genre = Genre::find($id);
        // $genre->delete();

        Genre::destroy($id);

        return redirect('admin');
    }
}

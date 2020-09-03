<?php

namespace App\Http\Controllers;

use GuzzleHttp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $client = new GuzzleHttp\Client();
        $response = $client->request('GET', 'http://127.0.0.1:84/api/genre');
        $genres = json_decode((string) $response->getBody(), true);

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
        // Validating data entered bu the user

        $validatedData = $request->validate([
            'genre_name' => ['required', 'unique:genres,name', 'max:40'],
            'image' => ['required', 'image', 'max:1024']
        ]);

        // Storing the new created genre to the db.
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

        session()->push('m', 'success');
        session()->push('m', 'Genre created successfully!');
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
        $genre = Genre::find($id);
        // $all_movies = DB::table('genres')
        //     ->join('movies', 'genres.id', '=', 'movies.genre_id')
        //     ->where('genres.id', $id)
        //     ->get();

        $all_movies = $genre->movies;

        $array_of_actors = [];

        foreach ($all_movies as $movie) {
            array_push(
                $array_of_actors,
                // DB::table("movies")
                //     ->join("movies_actors_relationship", "movies.id", "=", "movies_actors_relationship.movie_id")
                //     ->join("actors", "movies_actors_relationship.actor_id", "=", "actors.id")->where("movies.id", $movie->id)
                //     ->select("actors.first_name", "actors.id")->get()
                $movie->actors()->select("actors.first_name", "actors.id")->get()
            );
        }

        return view('moviesViewsContainer.moviesOfGenre', compact('genre', $genre, 'all_movies', $all_movies, 'array_of_actors', $array_of_actors));
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

        session()->push('m', 'success');
        session()->push('m', 'Genre updated successfully!');

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

        session()->push('m', 'danger');
        session()->push('m', 'Genre deleted temporarily!');

        return redirect('admin');
    }


    public function restore($id)
    {
        $genre = Genre::onlyTrashed()->find($id);
        $genre->restore();

        session()->push('m', 'info');
        session()->push('m', 'Genre restored successfully!');

        return redirect('admin');
    }

    public function deleteForever($id)
    {
        $genre = Genre::onlyTrashed()->find($id);
        $genre->forceDelete();

        session()->push('m', 'danger');
        session()->push('m', 'Genre deleted successfully!');

        return redirect('admin');
    }
}

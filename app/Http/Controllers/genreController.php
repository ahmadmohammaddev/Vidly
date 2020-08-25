<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class genreController extends Controller
{
    // Basic Controller methods
    // TODO change the name of the controller to be admin controller
    // and then make suitable changes to methodes

    public function index()
    {
        $genres = DB::table('genres')->get();
        return view('moviesViewsContainer.admin', $genres)->with('genres', $genres);
    }

    public function createNewGenre()
    {
        return '<center><h1>Adding new genre</h1></center>';
    }

    public function saveNewGenre()
    {
        //$genreName = Input::get('genreName');
        //VaLidate the input then save it to the database

    }

    public function showGenre($genreName)
    {
        return '<center><h1>This page is for ' . $genreName .  ' genre</h1></center>';
    }

    public function editGenre($genreName)
    {
        return '<center><h1>The form for editing ' . $genreName .  ' genre</h1></center>';
    }

    public function saveEditedGenre($genreName)
    {
        //VaLidate the input then save it to the database
    }

    public function deleteGenre($genreName)
    {
        //deleting the genre from the database
    }
}

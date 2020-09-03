<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use App\Genre;

class AdminController extends Controller
{
    // Basic Controller methods
    // TODO change the name of the controller to be admin controller
    // and then make suitable changes to methodes

    public function adminPanel()
    {
        //$genres = DB::table('genres')->get();
        $genres = Genre::withTrashed()->get();
        return view('moviesViewsContainer.admin', $genres)->with('genres', $genres);
    }
}

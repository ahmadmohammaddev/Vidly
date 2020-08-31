<?php

namespace App\Http\Controllers;

use App\Genre;

use Illuminate\Http\Request;

class GenreApiController extends Controller
{
    //

    public function index()
    {

        return response()->json(Genre::get(), 200);
    }

    public function show($id)
    {
        return response()->json(Genre::find($id), 200);
    }
}

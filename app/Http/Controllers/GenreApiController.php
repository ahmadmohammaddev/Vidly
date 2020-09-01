<?php

namespace App\Http\Controllers;

use App\Genre;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreApiController extends Controller
{
    //

    public function index()
    {

        return response()->json(Genre::get(), 200);
    }

    public function show($id)
    {
        return response()->json(Genre::findOrFail($id), 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|max:10',
        ];
        $validator = Validator::make($request->all(), $rules);
        dd($validator->fails());

        $genre = Genre::create($request->all());
        return response()->json($genre, 201);
    }

    public function update(Request $request, Genre $genre)
    {
        $genre->update($request->all());
        return response()->json($genre, 200);
    }

    public function delete(Request $request, Genre $genre)
    {
        $genre->delete();
        return response()->json(null, 204);
    }
}

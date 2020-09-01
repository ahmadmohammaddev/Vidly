<?php

namespace App\Http\Controllers;

use App\Http\Resources\Genre as GenreResource;
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
        $genre = Genre::find($id);
        if (is_null($genre)) {
            return response()->json(null, 404);
        }
        $response = new GenreResource(Genre::findOrFail($id), 200);
        return response()->json($response, 200);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => ['required', 'unique:genres,name', 'max:40'],
            'image_name' => ['required']
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

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

    public function errors()
    {
        return response()->json(['msg' => 'Payment is required.'], 501);
    }

    public function movies(Request $request, Genre $genre)
    {
        $movies = $genre->movies;
        return response()->json($movies, 200);
    }
}

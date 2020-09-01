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
}

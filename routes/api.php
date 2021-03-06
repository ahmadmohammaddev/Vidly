<?php

use App\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('genre', 'GenreApiController@index');

Route::get('genre/{id}', 'GenreApiController@show');

Route::post('genre', 'GenreApiController@store');

Route::put('genre/{genre}', 'GenreApiController@update');

// Route::middleware('can:update,genre')->put('genre/{genre}', 'GenreApiController@update');

// Route::put('/genre/{genre}', function (Genre $genre) {
//     $genre->update($request->all());
//     return response()->json($genre, 200);
// })->middleware('can:update,genre');

Route::delete('genre/{genre}', 'GenreApiController@delete');

Route::any('errors', 'GenreApiController@errors');

Route::apiResource('movie', 'MovieApiController');

Route::get('genre/{genre}/movies', 'GenreApiController@movies');

Route::get('movie/{movie}/actors', 'MovieApiController@actors');

Route::apiResource('actor', 'ActorApiController');

Route::get('actor/{actor}/movies', 'ActorApiController@movies');

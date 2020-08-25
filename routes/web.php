<?php

use App\Http\Controllers\genreController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::redirect('/', '/genre');

// Basic Controller routes
/*
Route::get('genres', 'genreController@index');

Route::get('genres/create', 'genreController@createNewGenre');

Route::post('genres/create', 'genreController@saveNewGenre');

Route::get('genres/{genreName}', 'genreController@showGenre');

Route::get('genres/{genreName}/edit', 'genreController@editGenre');

Route::patch('genres/{genreName}/edit', 'genreController@saveEditedGenre');

Route::delete('genres/{genreName}/delete', 'genreController@deleteGenre');
*/

Route::resource('genre', 'GenreResourceController');

Route::get('admin', 'genreController@index');

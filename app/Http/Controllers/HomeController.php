<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use App\Genre;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $client = new Client();
        $response = $client->request('GET', 'http://127.0.0.1:84/api/genre');

        $genres = json_decode((string) $response->getBody());
        //dd($genres);
        //$genres = Genre::all();
        return view('home')->with('genres', $genres);
    }
}

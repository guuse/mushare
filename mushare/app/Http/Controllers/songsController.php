<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Song;
use App\Genre;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class songsController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        $songs = Song::all();

        return view('genres.index', compact('genres','songs'));
    }
    public function show($id)
    {
        $genre = Genre::find($id);
        return view('genres.show', compact('song'));
    }

}

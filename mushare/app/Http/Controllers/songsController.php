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
        $songs = Song::all();
        $genres = Genre::all();



        return view('songs.index', compact('songs','genres','genre'));
    }
    public function show($id)
    {
        $song = Song::find($id);
        $genre = DB::table('genres')->join('songs', 'genres_id', '=', 'songs.user_id')->select('genres.name')->get();
        return view('songs.show', compact('song','genre'));
    }

}

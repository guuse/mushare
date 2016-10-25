<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Song;
use App\Genre;
use App\User;
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
        $user = User::find($id);
        return view('genres.show', compact('genre','likes','user'));
    }
    public function addSong(Request $request, $id)
    {
        $genre = Genre::find($id);

        $song = new Song;

        $song->name = $request->name;
        $song->artist = $request->artist;
        $song->link = $request->link;
        $song->extra = $request->extra;
        $song->genre_id = $request->genre_id;
        $song->users_id = $request->users_id;

        $genre->songs()->save($song);

        return back();
    }
}

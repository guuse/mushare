<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Song;
use App\Genre;
use App\User;
use Auth;
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
    public function show(Genre $genre)
    {
        $genre->load('songs.users');
        return view('genres.show', compact('genre','likes','link'));
    }
    public function addSong(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'artist' => 'required',
            'link' => 'required'
        ]);

        $genre = Genre::find($id);

        $song = new Song;

        $song->name = $request->name;
        $song->artist = $request->artist;
        $song->link = $request->link;
        $song->extra = $request->extra;
        $song->genre_id = $request->genre_id;
        $song->users_id = $request->users_id;
        $song->user_id = $request->user_id;

        save($genre);

        return back();
    }

    public function editSong(Song $song)
    {
        return view('songs.edit', compact('song'));
    }

    public function update(Request $request, Song $song)
    {
        $song ->update($request->all());
        return redirect()->route('profile', ['user'=>Auth::User()->id]);
    }
    public function mySongs (User $user)
    {
        $user ->load('song');
        return view('profile.mysongs', compact('user'));
    }
}

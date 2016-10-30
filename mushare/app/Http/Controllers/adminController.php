<?php

namespace App\Http\Controllers;

use App\Genre;
use App\User;
use DB;
use Auth;
use Illuminate\Http\Request;


class adminController extends Controller
{

    public function admin(){
        $users = User::all();
        $genres = Genre::all();

        return view('admin.home', compact('users','genres'));
    }

    public function addGenre(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $genre = new Genre;

        $genre->name = $request->name;


        $genre->songs()->save($genre);

        return back();
    }
    public function editGenre(Genre $genre){
        return view('admin.editgenre', compact('genre'));

    }

    public function update(Request $request, Genre $genre)
    {
        $genre ->update($request->all());
        return redirect()->route('admin');
    }

    public function editUser(User $user){
        return view('admin.edituser', compact('user'));
    }

    public function updateUser(Request $request, User $user)
    {
        $user ->update($request->all());
        return redirect()->route('admin');
    }

    public function delete(Genre $genre){
        return view('admin.deletegenre', compact('genre'));
    }

    public function deleteGenre(Genre $genre){

        $genre->delete();
        return redirect()->route('admin');
    }

    public function search(Request $request){
        $users = DB::table('users')->where('name', 'like', $request->searched )->get();
        return view('admin.search', compact('users','request'));
    }
}

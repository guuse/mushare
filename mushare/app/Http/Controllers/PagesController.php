<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function contact(){
        $nummers = ['06-12345678','010-23123123'];
        return view('contact')->with('nummers',$nummers);
    }

    public function home(){
        if(Auth::user()){
            return redirect('home');
        }
        else{
            return view('welcome');
        }
    }
}

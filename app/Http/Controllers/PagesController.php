<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function login(){
        $title = 'This is 360 Feedback page';
        return view('pages.login')->with('mytitle',$title);
    }

    public function home(){
        return view('pages.home');
    }

    public function users(){
        return view('pages.users');
    }

    public function edit_user(){
        return view('pages.eddit-user');
    }

    public function new_user(){
        return view('pages.new-user');
    }
}

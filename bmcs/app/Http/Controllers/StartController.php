<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartController extends Controller
{
    //
    public function index(){
        return view('index');
    }

    public function home(){
        return view('pages.home');
    }
    public function about(){
        return view('pages.about');
    }
}


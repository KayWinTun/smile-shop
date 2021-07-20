<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    function home(){
        return view('template.home');
    }

    function about(){
        return view('template.about');
    }

    function post(){
        return view('template.post');
    }

    function contact(){
        return view('template.contact');
    }
}

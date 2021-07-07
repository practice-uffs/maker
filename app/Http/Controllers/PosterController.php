<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PosterController extends Controller
{
    //

    public function index(){
        return view('poster.index');
    }
}

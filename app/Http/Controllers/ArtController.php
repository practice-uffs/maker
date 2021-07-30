<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArtController extends Controller
{
    public function index(){
        return view('art.index');
    }
}

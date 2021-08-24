<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index(){
        $sites = auth()->user()->sites()->get();
        return view('site.index', compact('sites'));
    }
    
    public function create(){
        return view('site.create');
    }
}

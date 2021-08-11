<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;


class BookController extends Controller
{
    public function index(){
        $books = auth()->user()->books()->get();
        return view('book.index', compact('books'));
    }
    
    public function create(){
        return view('book.create');
    }

    public function show(Book $book){
        return view('book/show', compact('book'));
    }

}

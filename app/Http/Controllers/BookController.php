<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GoogleDoc;
use App\Models\Book;
use App\Jobs\MakeBookJob;
use stdClass;

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

    public function update(Book $bookToUpdate){
        $docs = new GoogleDoc(config('google.docs'));
        if ($docs->downloadFileById($this->parseUrl($bookToUpdate->google_drive_url))){
            $book = new stdClass();
            $book->name = $bookToUpdate->name;
            $book->description = $bookToUpdate->description;
            $book->google_drive_url = $bookToUpdate->google_drive_url;
            $book->build_status = 'updating';
            $book->build_output = '';
            $book->pdf_path = $bookToUpdate->pdf_path;
            MakeBookJob::dispatch($book, auth()->user());
            return redirect(route('books'));
        }
        return redirect(route('books'));
    }

    public function parseUrl($url){
        preg_match('/(?<=\/d\/).*(?=\/edit)/', $url, $id);
        return $id;
    }

}

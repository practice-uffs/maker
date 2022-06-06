<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\GoogleDoc;
use Illuminate\Support\Str;
use App\Models\Book;
use App\Jobs\UpdateBookJob;
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
        $userHasBook = 0;
        foreach(auth()->user()->books()->get() as $bookFromQuery){
            if($book == $bookFromQuery) {
                $userHasBook = 1;
            }
        }
        if($userHasBook == 1){
            return view('book/show', compact('book'));
        } else {
            return redirect(route('books'));
        }
    }

    public function update(Book $bookToUpdate){
        $bookToUpdate->build_status = 'processing';
        $bookToUpdate->save();
        $docs = new GoogleDoc(config('google.docs'));
        if ($docs->verifyFileById($this->parseUrl($bookToUpdate->google_drive_url))){
            $book = new stdClass();
            $book->theme = $bookToUpdate->theme;
            $book->google_drive_url = $bookToUpdate->google_drive_url;
            $book->id = $bookToUpdate->id;
            $book->name = $bookToUpdate->name;
            $book->docs_id = $this->parseUrl($bookToUpdate->google_drive_url);
            $book->docs_id = Str::slug($book->docs_id);
            UpdateBookJob::dispatch($book);
            return redirect(route('books'));
        }
        return redirect(route('books'));
    }

    public function parseUrl($url){
        preg_match('/(?<=\/d\/).*(?=\/edit)/', $url, $id); 
        if( $id != null){
            return $id[0];
        } else {
            return '';
        }
    }

}

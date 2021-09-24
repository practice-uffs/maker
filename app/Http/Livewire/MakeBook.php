<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Services\GoogleDoc;
use App\Jobs\MakeBookJob;
use stdClass;

class MakeBook extends Component
{
    public $docsContent;
    public $docsUrl = '';
    public $createBookError = false;

    public function render()
    {
        return view('livewire.make-book');
    }

    public function submit()
    {
        $docs = new GoogleDoc(config('google.docs'));
        $this->docsContent = $docs->findBookById($this->parseUrl($this->docsUrl));
        return;
    }

    public function parseUrl($url){
        preg_match('/(?<=\/d\/).*(?=\/edit)/', $url, $id);
        return $id;
    }


    public function createBook(){
        $docs = new GoogleDoc(config('google.docs'));
        if ($docs->downloadFileById($this->parseUrl($this->docsUrl))){
            $book = new stdClass();
            $book->name = $this->docsContent['title'];
            $book->description = '';
            $book->google_drive_url = $this->docsUrl;
            $book->build_status = 'done';
            $book->build_output = '';
            $book->docs_id = $this->parseUrl($this->docsUrl);
            $book->docs_id = Str::slug($book->docs_id[0]);
            $book->pdf_path = '/book/export/'.$book->docs_id.'-light.pdf';
            MakeBookJob::dispatch($book, auth()->user());
            return redirect(route('books'));
        } else {
            $this->createBookError = true;
        }
    }

}

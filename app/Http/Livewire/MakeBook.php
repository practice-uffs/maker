<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\GoogleDoc;
use App\Jobs\MakeBookJob;
use stdClass;

class MakeBook extends Component
{
    public $docsContent;
    public $docsUrl = '';
    public $pdf = null;
    public $createBookError = false;

    public function render()
    {
        return view('livewire.make-book');
    }

    public function submit()
    {
        $docs = new GoogleDoc(config('google.docs'));
        $this->docsContent = $docs->findFileById($this->parseUrl($this->docsUrl));
        return;
    }

    public function parseUrl($url){
        preg_match('/(?<=\/d\/).*(?=\/edit)/', $url, $id);
        return $id;
    }

    function sanitizeString($str) {
        $str = preg_replace('/[áàãâä]/ui', 'a', $str);
        $str = preg_replace('/[éèêë]/ui', 'e', $str);
        $str = preg_replace('/[íìîï]/ui', 'i', $str);
        $str = preg_replace('/[óòõôö]/ui', 'o', $str);
        $str = preg_replace('/[úùûü]/ui', 'u', $str);
        $str = preg_replace('/[ç]/ui', 'c', $str);
        $str = preg_replace('/[,(),.;\[\]\{\}:|!"#$%&\/=?~^><ªº]/', '', $str);
        $str = preg_replace('/(\s)+/', '-', $str);
        $str = preg_replace('/(_)+/', '-', $str);
        $str = preg_replace('/(-)+/', '-', $str);
        $str = strtolower($str);
        return $str;
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
            $book->pdf_path = '/book/export/'.str_replace(' ','-',$this->sanitizeString($this->docsContent['title'])).'-light.pdf';
            MakeBookJob::dispatch($book, auth()->user());
            return redirect(route('books'));
            
        } else {
            $this->createBookError = true;
        }
        $this->pdf = $this->sanitizeString($this->docsContent['title']);
    }

}

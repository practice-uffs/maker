<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\GoogleDoc;

class MakeBook extends Component
{
    public $docsContent;
    public $docsUrl = '';
    public $pdf = null;

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

    public function createBook(){
        $docs = new GoogleDoc(config('google.docs'));
        $output = [];
        if ($docs->downloadFileById($this->parseUrl($this->docsUrl))){
            $code = -1;
            $cmd = 'cd book & ibis build';
            exec($cmd, $output, $code);
        }
        $this->pdf = 'livro-digital-light';
        return; 
    }

}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\GoogleDoc;

class ListedDocs extends Component
{
    private $docs;
    public function render()
    {
        $this->docs = new GoogleDoc(config('google.docs'));
        return view('livewire.listed-docs');
    }
    public function getHtmlDocs(){
        return $this->docs->getFilesAsHtml();
    }
    public function getPlainTextDocs(){
        return $this->docs->getFilesAsPlainText();
    }
}

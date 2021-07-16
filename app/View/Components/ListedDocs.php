<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Services\GoogleDoc;
class ListedDocs extends Component
{
    public $docs;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $this->docs = new GoogleDoc();
        return view('components.listed-docs');
    }
}

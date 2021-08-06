<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\GoogleDoc;

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
        $output = [];
        if ($docs->downloadFileById($this->parseUrl($this->docsUrl))){
            $code = -1;
            $content = '
            <?php
            return [
                \'title\' => \''.$this->docsContent['title'].'\',
                \'author\' => \'PRACTICE\',
                \'fonts\' => [],
                \'document\' => [
                    \'format\' => [210, 297],
                    \'margin_left\' => 27,
                    \'margin_right\' => 27,
                    \'margin_bottom\' => 14,
                    \'margin_top\' => 14,
                ],
                \'cover\' => [
                    \'position\' => \'position: absolute; left:0; right: 0; top: -.2; bottom: 0;\',
                    \'dimensions\' => \'width: 210mm; height: 297mm; margin: 0;\',
                ],
                \'sample\' => [
                    [1, 3],
                    [80, 85],
                    [100, 103]
                ],
                \'sample_notice\' => \'This is a sample from "Laravel Queues in Action" by Mohamed Said. <br> 
                                    For more information, <a href="https://www.learn-laravel-queues.com/">Click here</a>.\',
            ];';
            $file = "book/ibis.php";
            $fh = fopen($file, 'w') or die("can't open file");
            fwrite($fh, $content);
            fclose($fh);
            $cmd = 'cd book & ibis build';
            exec($cmd, $output, $code);
            array_map('unlink', glob("book/content/*.md"));
        } else {
            $this->createBookError = true;
        }
        $this->pdf = $this->sanitizeString($this->docsContent['title']);
    }

}

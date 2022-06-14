<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\GoogleDoc;
use App\Models\Book;
use stdClass;

class UpdateBookJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private $book;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(\stdClass $book)
    {
        $this->book = $book;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $content = '
        <?php
        return [
            \'title\' => \''.$this->book->docs_id.'\',
            \'author\' => \'PRACTICE\',
            \'fonts\' => [
                \'roboto\' => \'Roboto-Regular.ttf\',
            ],
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
            \'sample_notice\' => \'This is a book generated using Ibis, more information about ibis in: https://github.com/themsaid/ibis\',
        ];';

        $docs = new GoogleDoc(config('google.docs'));
        if ($docs->downloadFileById($this->parseUrl($this->book->google_drive_url))){

            $file = public_path()."/book/ibis.php";
            $fh = fopen($file, 'w') or die("can't open file");
            fwrite($fh, $content);
            fclose($fh);

            if ($this->book->theme == 'dark'){
                rename(public_path()."/book/assets/dark.jpg", public_path()."/book/assets/cover.jpg");
                $cmd = 'cd public && cd book && '.env("IBIS").' build dark';
            } else {
                rename(public_path()."/book/assets/light.jpg", public_path()."/book/assets/cover.jpg");
                $cmd = 'cd public && cd book && '.env("IBIS").' build';
            }
            
            $output = shell_exec($cmd);
            array_map('unlink', glob(public_path()."/book/content/*.md"));

            if ($this->book->theme == 'dark'){
                rename(public_path()."/book/assets/cover.jpg", public_path()."/book/assets/dark.jpg");
            } else {
                rename(public_path()."/book/assets/cover.jpg", public_path()."/book/assets/light.jpg");
            }

            $book = Book::find($this->book->id);
            $book->build_status = 'done';
            $book->build_output = $output;
            $book->save();
        }
    }

    public function parseUrl($url){
        preg_match('/(?<=\/d\/).*(?=\/edit)/', $url, $id);
        return $id;
    }
}

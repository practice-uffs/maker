<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Book;
use App\Models\User;

class MakeBookJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private $book;
    private $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(\stdClass $book, User $user)
    {
        $this->book = $book;
        $this->user = $user;
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
        $file = public_path()."/book/ibis.php";
        $fh = fopen($file, 'w') or die("can't open file");
        fwrite($fh, $content);
        fclose($fh);

        $cmd = 'cd public && cd book && '.env("IBIS").' build';
        $output = shell_exec($cmd);

        array_map('unlink', glob(public_path()."/book/content/*.md"));

        $book = Book::where('pdf_path', '=', $this->book->pdf_path)->first();
        if ($book === null) {
            $this->user->books()->create([
                'name' => $this->book->name,
                'description' => $this->book->description,
                'google_drive_url' => $this->book->google_drive_url,
                'build_status' => 'done',
                'build_output' => $output,
                'pdf_path' => $this->book->pdf_path
            ]);
        } else{
            $newBook = Book::where('google_drive_url', '=', $this->book->google_drive_url)->first();
            $newBook->build_status = 'done';
            $newBook->build_output = $output;
            $newBook->save();
        }
    }
}

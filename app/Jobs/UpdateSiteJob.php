<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Models\Site;
use stdClass;

class UpdateSiteJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    private $site;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(\stdClass $site)
    {
        $this->site = $site;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $folder = $this->site->google_drive_id;
        $absolutePathToFolder = Storage::disk('sites')->path($folder);
        exec('rm -r '. $absolutePathToFolder .'*');

        $updatedSite = Site::where('google_drive_id', '=', $this->site->google_drive_id)->first();
        $updatedSite->build_status = 'Done';
        $updatedSite->build_output = 'Done';

        foreach ($this->site->contents as $content){
            if( $content['path'] != 'caminho-nao-informado'){
                $path = $content['path'];
                $path = str_replace('/','nova-contra-barra',$path);
                $path = Str::slug($path);
                $path = str_replace('nova-contra-barra','/',$path);

                $fileContent = $content['content'];
                Storage::disk('sites')->put("$folder/$path/index.html", $fileContent);
            } else {
                $fileContent = $content['content'];
                Storage::disk('sites')->put("$folder/index.html", $fileContent);
            }
        }
    }
}

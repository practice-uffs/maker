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
        array_map('unlink', glob(Storage::disk('sites')->path($folder)."/*.html"));

        $updatedSite = Site::where('google_drive_id', '=', $this->site->google_drive_id)->first();
        $updatedSite->build_status = 'Done';
        $updatedSite->build_output = 'Done';
        foreach ($this->site->contents as $content){
            $fileName = Str::slug($content['title']);
            if(strlen($fileName) > 200){
                $fileName = substr($fileName, 0 , 200);
            }
            $fileContent = $content['content'];
            Storage::disk('sites')->put("$folder/$fileName.html", $fileContent);
        }
    }
}

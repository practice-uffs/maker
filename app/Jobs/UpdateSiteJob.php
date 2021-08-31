<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
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
        $updatedSite = Site::where('google_drive_id', '=', $this->site->google_drive_id)->first();
        $updatedSite->build_status = 'done';
        $updatedSite->build_status_changed_at = now();
        $folderName = $this->site->google_drive_id;
        $storagePath = storage_path();
        file_put_contents($storagePath.'\app\public\sites\\'.$folderName.'\index.html',$this->site->content);
        $updatedSite->save();
    }
}

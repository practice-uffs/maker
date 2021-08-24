<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Site;
use App\Models\User;
use stdClass;

class MakeSiteJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $site;
    private $user;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(\stdClass $site, User $user)
    {
        $this->site = $site;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $site = Site::where('google_drive_id', '=', $this->site->google_drive_id)->first();
        if ($site === null) {
            $this->user->sites()->create([
                'name' => $this->site->name,
                'description' => $this->site->description,
                'google_drive_id' => $this->site->google_drive_id,
                'google_drive_url' => $this->site->google_drive_url,
                'build_status' => $this->site->build_status,
                'build_status_changed_at' => $this->site->build_status_changed_at,
                'build_output' => $this->site->build_output,
                'serve_url' => $this->site->serve_url
            ]); 
            $code = 1;
            $path = $this->site->google_drive_id;
            $cmd = "cd storage & cd app & cd public & cd sites & mkdir $path";
            exec($cmd, $output, $code);
            file_put_contents(storage_path()+"/app/public/sites/$path/index.html",$this->site->content);
        } else {
            $newSite = Site::where('google_drive_id', '=', $this->site->google_drive_id)->first();
            $newSite->name = $this->site->name;
            $newSite->description = $this->site->description;
            $newSite->google_drive_id = $this->site->google_drive_id;
            $newSite->google_drive_url = $this->site->google_drive_url;
            $newSite->build_status = $this->site->build_status;
            $newSite->build_status_changed_at = $this->site->build_status_changed_at;
            $newSite->build_output = $this->site->build_output;
            $newSite->serve_url = $this->site->serve_url;
            $path = $this->site->google_drive_id;
            file_put_contents("/storage/app/public/sites/$path/index.html",$this->site->content);
            $newSite->save();
        }
        
    }
}

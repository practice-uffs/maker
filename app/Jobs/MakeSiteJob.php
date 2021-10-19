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
        $folder = $this->site->google_drive_id;
       
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
            foreach ($this->site->contents as $content){
                $path = $content['path'];
                if( $path != 'caminho-nao-informado'){
                    $path = str_replace('/','nova-contra-barra',$path);
                    $path = Str::slug($path);
                    $path = str_replace('nova-contra-barra','/',$path);
                    $path = "$folder/$path/index.html";
                } else {
                    $path = "$folder/index.html";
                }
                Storage::disk('sites')->put($path, $content['content']);
            }

        } else {
            Storage::disk('sites')->deleteDirectory($folder);

            $updatedSite = Site::where('google_drive_id', '=', $this->site->google_drive_id)->first();
            $updatedSite->build_status = 'Done';
            $updatedSite->build_status_changed_at = $this->site->build_status_changed_at;
            $updatedSite->build_output = 'Done';
            
            foreach ($this->site->contents as $content){
                $path = $content['path'];
                if( $path != 'caminho-nao-informado'){
                    $path = str_replace('/','nova-contra-barra',$path);
                    $path = Str::slug($path);
                    $path = str_replace('nova-contra-barra','/',$path);
                    $path = "$folder/$path/index.html";
                } else {
                    $path = "$folder/index.html";
                }
                Storage::disk('sites')->put($path, $content['content']);
            }
        }
        
    }
    
    
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\GoogleDoc;
use Illuminate\Support\Str;
use App\Jobs\MakeSiteJob;
use stdClass;

class MakeSite extends Component
{
    public $docsContent;
    public $docsUrl = '';
    public $siteUrl = '';
    public $createSiteError = false;
    public function render()
    {
        return view('livewire.make-site');
    }
    public function submit()
    {
        $docs = new GoogleDoc(config('google.docs'));
        $this->docsContent = $docs->findFileById($this->parseUrl($this->docsUrl));
        if ($this->docsContent['error'] != 'File not found'){
            $site = new stdClass();
            $site->name = $this->docsContent['title'];
            $site->description = '';
            $site->google_drive_id = $this->parseUrl($this->docsUrl);
            $site->google_drive_id = Str::slug($site->google_drive_id);
            $site->google_drive_url = $this->docsUrl;
            $site->build_status = 'done';
            $site->build_status_changed_at = now()->toDateTimeString();
            $site->build_output = '';
            $site->serve_url = $this->siteUrl;
            $site->content = $this->docsContent['content'];
            MakeSiteJob::dispatch($site, auth()->user());
            return redirect(route('sites'));
        } else {
            $this->createSiteError = true;
        }
    }
    public function parseUrl($url){
        preg_match('/(?<=\/d\/).*(?=\/edit)/', $url, $id); 
        if( $id != null){
            return $id[0];
        } else {
            return '';
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;
use Illuminate\Support\Str;
use App\Services\GoogleDoc;
use App\Jobs\UpdateSiteJob;
use stdClass;

class SiteController extends Controller
{
    public function index(){
        $sites = auth()->user()->sites()->get();
        return view('site.index', compact('sites'));
    }
    
    public function create(){
        return view('site.create');
    }

    public function show(Site $site){
        $userHasSite = false;
        foreach(auth()->user()->sites()->get() as $siteFromQuery){
            if($site == $siteFromQuery) {
                $userHasSite = true;
            }
        }
        if($userHasSite == true){
            return view('site/show', compact('site'));
        } else {
            return redirect(route('sites'));
        }
    }

    public function update(Site $siteToUpdate){
        $siteToUpdate->build_status = 'processing';
        $siteToUpdate->save();
        $docs = new GoogleDoc(config('google.docs'));
        if ($document = $docs->findFileById($this->parseUrl($siteToUpdate->google_drive_url))){
            $site = new stdClass();
            $site->google_drive_id = $this->parseUrl($siteToUpdate->google_drive_url);
            $site->google_drive_id = Str::slug($site->google_drive_id[0]);
            $site->content = $document['content'];
            UpdateSiteJob::dispatch($site);
            return redirect(route('sites'));
        }
        return redirect(route('sites'));
    }

    public function parseUrl($url){
        preg_match('/(?<=\/d\/).*(?=\/edit)/', $url, $id);
        return $id;
    }
}

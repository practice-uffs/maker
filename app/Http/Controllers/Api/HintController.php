<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Reshot;
use Illuminate\Http\Request;
use MarkSitko\LaravelUnsplash\UnsplashFacade as Unsplash;

class HintController extends Controller
{
    protected $reshot;

    public function __construct(Reshot $reshot)
    {
        $this->reshot = $reshot;
    }
        
    protected function unsplashRandomPhoto($text) {
        $randomPhoto = Unsplash::randomPhoto()
            ->orientation('landscape')
            ->term($text)
            ->count(1)
            ->toJson();
    }

    public function photos(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:255',
            'amount' => 'integer',
        ]);

        $text = $request->input('text');
        $amount = $request->input('amount', 1);

        return response()->json([
            'type' => 'photos',
            'entries' => $this->reshot->photos($text, $amount),
        ]);
    }

    public function icons(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:255',
            'amount' => 'integer',
        ]);

        $text = $request->input('text');
        $amount = $request->input('amount', 1);

        return response()->json([
            'type' => 'icons',
            'entries' => $this->reshot->icons($text, $amount),
        ]);
    }    

    public function illustrations(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:255',
            'amount' => 'integer',
        ]);

        $text = $request->input('text');
        $amount = $request->input('amount', 1);

        return response()->json([
            'type' => 'illustrations',
            'entries' => $this->reshot->illustrations($text, $amount),
        ]);
    }

    protected function findPhotos($text, $amount) {
        return $this->reshot->photos($text, $amount);
    }

    protected function findIcons($text, $amount) {
        return $this->reshot->icons($text, $amount);
    }    

    protected function findIllustrations($text, $amount) {
        return $this->reshot->illustrations($text, $amount);
    }   
 
    public function index(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:255',
            'amount' => 'integer',
        ]);

        $text = $request->input('text');
        $amount = $request->input('amount', 1);

        return response()->json([
            'category' => 'any',
            'entries' => [
                'photos' => $this->findPhotos($text, $amount),
                'icons' => $this->findIcons($text, $amount),
                'illustrations' => $this->findIllustrations($text, $amount),
            ]
        ]);
    }
}

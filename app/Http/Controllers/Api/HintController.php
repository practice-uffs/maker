<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Reshot;
use MarkSitko\LaravelUnsplash\UnsplashFacade as Unsplash;

class HintController extends Controller
{
    protected $reshot;

    public function __construct(Reshot $reshot)
    {
        $this->reshot = $reshot;
    }
        
    protected function unsplashRandomPhoto($text) {
            /*$randomPhoto = Unsplash::randomPhoto()
            ->orientation('landscape')
            ->term($text)
            ->count(1)
            ->toJson();*/

            return [
                'images' => [
                    [
                        'urls' => [
                            'full' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80',
                        ],
                    ],
                    [
                        'urls' => [
                            'full' => 'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1170&q=80',
                        ],
                    ],                
                ],
            ];
    }

    public function photos(string $text) {
        return response()->json([
            'category' => 'photos',
            'entries' => $this->reshot->photos($text)
        ]);
    }

    public function icons(string $text) {
        return response()->json([
            'category' => 'icons',
            'entries' => $this->reshot->icons($text)
        ]);
    }    

    public function illustrations(string $text) {
        return response()->json([
            'category' => 'illustrations',
            'entries' => $this->reshot->illustrations($text)
        ]);
    }

    protected function findPhotos($text) {
        return $this->reshot->photos($text);
    }

    protected function findIcons($text) {
        return $this->reshot->icons($text);
    }    

    protected function findIllustrations($text) {
        return $this->reshot->illustrations($text);
    }   
 
    public function index(string $text)
    {
        return response()->json([
            'category' => 'any',
            'entries' => [
                'photos' => $this->findPhotos($text),
                'icons' => $this->findIcons($text),
                'illustrations' => $this->findIllustrations($text),
            ]
        ]);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    public function download(Request $request)
    {
       return response()->json([
            'download_url' => '',
        ]);
    }
}

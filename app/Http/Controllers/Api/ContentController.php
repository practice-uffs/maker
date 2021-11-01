<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use stdClass;

class ContentController extends Controller
{
    protected function renderContent(string $id, string $content, stdClass $params) {
        $resultBase64 = '';
        $contentUrl = route('content.view', ['id' => $id]);
        
        // TODO: chamar o puppeter aqui para acessar a url $contentUrl, tirar um print e retornar esse print como base64

        return $resultBase64;
    }

    public function download(Request $request)
    {
        $request->validate([
            'id' => 'required',
            'content' => 'required',
            'params' => 'required'
        ]);

        $id = $request->input('id');
        $content = $request->input('content');
        $params = json_decode($request->input('params', '{}'));

        Log::debug('Content download requested for id=' . $id . "\n" . print_r($params, true) . "\n" . $content);
        
        Storage::put($id, $content);
        $resultBase64 = $this->renderContent($id, $content, $params);

        return response()->json([
            'image_base64' => $resultBase64,
        ]);
    }

    public function view(string $id) {
        $content = Storage::get($id);

        return response($content, 200, [
            'Content-Type' => 'text/html'
        ]);
    }
}

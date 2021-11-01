<?php

use App\Http\Controllers\Api\ContentController;
use App\Http\Controllers\Api\HintController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('content/view/{id}', [ContentController::class, 'view'])->name('content.view');

Route::group(['as' => 'api.'], function() {
    Route::get('content/download', [ContentController::class, 'download'])->name('content.download');

    Route::group(['prefix' => 'hint/graphic/'], function() {
        Route::get('any', [HintController::class, 'index'])->name('hint.any');
        Route::get('icons', [HintController::class, 'icons'])->name('hint.icons');
        Route::get('photos', [HintController::class, 'photos'])->name('hint.photos');
        Route::get('illustrations', [HintController::class, 'illustrations'])->name('hint.illustrations');
    });
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

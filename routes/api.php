<?php

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

Route::group(['as' => 'api.', 'prefix' => 'hint/graphic/'], function() {
    Route::get('any/{text?}', [HintController::class, 'index'])->name('hint.any');
    Route::get('icons/{text?}', [HintController::class, 'icons'])->name('hint.icons');
    Route::get('photos/{text?}', [HintController::class, 'photos'])->name('hint.photos');
    Route::get('illustrations/{text?}', [HintController::class, 'illustrations'])->name('hint.illustrations');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

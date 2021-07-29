<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PosterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookController;

use \App\Http\Controllers\ServiceController;
use \App\Http\Controllers\LousaController;
use \App\Http\Controllers\ItemController;
use \App\Http\Controllers\FeedbackController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::middleware(['auth:sanctum', 'verified'])->get('/livro', [BookController::class ,'index'])->name('book');
Route::middleware(['auth:sanctum', 'verified'])->get('/poster', PosterController::class . '@index')->name('poster');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->get('/digital-content', function () {
    return view('digital-content');
})->name('digital-content');


// Routes autenticadas
Route::group(['middleware' => ['auth']], function () {
    Route::get('/lousas','App\Http\Controllers\LousaController@index')->name('lousas');
    Route::get('/servicos/acompanhar','App\Http\Controllers\erviceController@acompanhar')->name('servicos/acompanhar');
    Route::get('/servicos/solicitar','App\Http\Controllers\ServiceController@solicitar')->name('servicos/solicitar');
    Route::resource('/servico', 'App\Http\Controllers\ItemController')->except(['create', 'store','update']);
    Route::get('/feedbacks', 'App\Http\Controllers\FeedbackController@index')->name('feedbacks');
    Route::resource('/feedback', 'App\Http\Controllers\ItemController')->except(['create', 'store','edit','update']);

    // Admin
    // Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin')->middleware('check.admin');
});



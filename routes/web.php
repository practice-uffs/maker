<?php

use App\Http\Controllers\Admin\SubscriberController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\PosterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

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

// Rotas públicas
Route::get('/', [IndexController::class, 'index'])->name('index');
Route::view('/newsletter/subscribed', 'newsletter.subscribed')->name('newsletter.subscribed');

// Autenticação
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

// Rotas autenticadas
Route::group(['middleware' => 'auth'], function () {
    Route::get('/inicial', [HomeController::class, 'index'])->name('home');
    Route::get('/poster', [PosterController::class, 'index'])->name('poster');

    Route::get('/livro/create', [BookController::class, 'create'])->name('book.create');
    Route::get('/livro/index', [BookController::class, 'index'])->name('books');
    Route::get('/livro/{book}', [BookController::class, 'show'])->name('book.show');

    // Admin
    Route::group(['middleware' => 'check.admin'], function () {
        Route::get('/gerenciar/usuarios', [UserController::class, 'index'])->name('admin.user');
        Route::get('/gerenciar/newsletter', [SubscriberController::class, 'index'])->name('admin.subscriber');
    });
});
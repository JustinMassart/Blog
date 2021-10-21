<?php

use App\Http\Controllers\SessionController;
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

Route::get('/', [\App\Http\Controllers\PostController::class, 'index'])->name('home');

Route::get('/posts/{post:slug}', [\App\Http\Controllers\PostController::class, 'show'])->name('post');

Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'create'])->middleware('guest');

Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [SessionController::class, 'create'])->middleware('guest');

Route::post('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Route::post('/sessions', [SessionController::class, 'store'])->middleware('guest');

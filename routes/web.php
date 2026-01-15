<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');

Route::resource('posts', PostController::class, ['except' => ['index']])->middleware('auth');

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

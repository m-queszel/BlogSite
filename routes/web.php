<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Auth::routes();
Route::resource('posts', PostController::class, ['except' => ['index', 'store']])->middleware('auth');


Route::get('/posts/{post}/comment/create', [CommentController::class, 'create'])->name('comment.create');

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');
Route::delete('/comment/{comment}', [CommentController::class, 'destroy'])->middleware('auth');

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('tags/{tag:name}', TagController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('posts', [PostController::class, 'store'])->middleware('auth', 'verified')->name('posts.store');

// Email Verification
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// Email Verification
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Email Verification
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

Route::post('posts/{post}/comment', [CommentController::class, 'store'])->name('comment.store');

// Route::post('posts/{post}/comment', function() {
//     dd('test');
// })
// ->name('comment.store');

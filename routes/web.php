<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Middleware\RedirectUnauthenticatedUser;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/google/redirect', [GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');
Route::middleware(RedirectUnauthenticatedUser::class)->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('index');

    Route::delete('/user/{id}', [UserController::class, 'delete'])->name('delete');

    Route:: put('/user/{id}/put', [UserController::class, 'update'])->name('update');

    Route::post('/userdata', [UserController::class, 'store'])->name('store');
});
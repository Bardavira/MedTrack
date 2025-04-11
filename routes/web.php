<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleLoginController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/google/redirect', [GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');

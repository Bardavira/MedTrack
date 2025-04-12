<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Middleware\RedirectUnauthenticatedUser;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login', function () {
    return view('login');
})->name('login');
Route::get('/google/redirect', [GoogleLoginController::class, 'redirectToGoogle'])->name('google.redirect');
Route::get('/google/callback', [GoogleLoginController::class, 'handleGoogleCallback'])->name('google.callback');
Route::middleware(RedirectUnauthenticatedUser::class)->group(function () {
    Route::get('/users', function () {
        $users = User::all();
        return view('user.index', compact('users'));
    });
});

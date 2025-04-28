<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\UbsUnitController;
use App\Http\Controllers\UbsWingController;
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
Route::get('/units', [UbsUnitController::class, 'index'])->name('unitsindex');

Route::get('/unitsdata', [UbsUnitController::class, 'store'])->name('unitsstore');

Route::get('/units/{id}/put', [UbsUnitController::class, 'update'])->name('unitsupdate');

Route::get('/units/{id}', [UbsUnitController::class, 'delete'])->name('unitsdelete');

Route::get('/wings', [UbsWingController::class, 'index'])->name('wingsindex');

Route::get('/wingsdata', [UbsWingController::class, 'store'])->name('wingsstore');

Route::get('/wings/{id}/put', [UbsWingController::class, 'update'])->name('wingsupdate');

Route::get('/wings/{id}', [UbsWingController::class, 'delete'])->name('wingsdelete');
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\MedicalRecordController;
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
    Route::prefix('/medical-records')->name('medical_records.')->group(function () {
        Route::get('/', [MedicalRecordController::class, 'index'])->name('index');
        Route::get('/store', function () {
            return view('medical_records.store_form')->name('store_form');
        });
        Route::get('/{id}', [MedicalRecordController::class, 'index'])->name('show');
        Route::post('/', [MedicalRecordController::class, 'store'])->name('store');
    });
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UbsUnitController;
use App\Http\Controllers\UbsWingController;
use App\Http\Controllers\GoogleLoginController;
use App\Http\Controllers\MedicalRecordController;
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
    Route::prefix('/medical-records')->name('medical_records.')->group(function () {
        Route::get('/', [MedicalRecordController::class, 'index'])->name('index');
        Route::get('/store', [MedicalRecordController::class, 'storeForm'])->name('store_form');
        Route::get('/{id}', [MedicalRecordController::class, 'show'])->name('show');
        Route::get('/{id}/update', [MedicalRecordController::class, 'updateForm'])->name('update_form');
        Route::get('/{id}/move-record', [MedicalRecordController::class, 'moveRecordForm'])->name('move_record_form');
        Route::post('/{id}/move-record', [MedicalRecordController::class, 'moveRecord'])->name('move_record');
        Route::post('/', [MedicalRecordController::class, 'store'])->name('store');
        Route::put('/{id}', [MedicalRecordController::class, 'update'])->name('update');
    });
    Route::prefix('/users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/store', [UserController::class, 'storeForm'])->name('store_form');
        Route::get('/{id}', [UserController::class, 'show'])->name('show');
        Route::get('/{id}/update', [UserController::class, 'updateForm'])->name('update_form');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::put('/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/{id}', [UserController::class, 'delete'])->name('delete');
    });
    Route::prefix('/units')->name('units.')->group(function () {
        Route::get('/', [UbsUnitController::class, 'index'])->name('index');
        Route::get('/store', [UbsUnitController::class, 'storeForm'])->name('store_form');
        Route::get('/{id}', [UbsUnitController::class, 'show'])->name('show');
        Route::get('/{id}/update', [UbsUnitController::class, 'updateForm'])->name('update_form');
        Route::post('/', [UbsUnitController::class, 'store'])->name('store');
        Route::put('/{id}', [UbsUnitController::class, 'update'])->name('update');
        Route::delete('/{id}', [UbsUnitController::class, 'delete'])->name('delete');
    });
    Route::prefix('/wings')->name('wings.')->group(function () {
        Route::get('/', [UbsWingController::class, 'index'])->name('index');
        Route::get('/store', [UbsWingController::class, 'storeForm'])->name('store_form');
        Route::get('/{id}', [UbsWingController::class, 'show'])->name('show');
        Route::get('/{id}/update', [UbsWingController::class, 'updateForm'])->name('update_form');
        Route::post('/', [UbsWingController::class, 'store'])->name('store');
        Route::put('/{id}', [UbsWingController::class, 'update'])->name('update');
        Route::delete('/{id}', [UbsWingController::class, 'delete'])->name('delete');
    });
});
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', [UserController::class, 'index'])->name('index');

Route::delete('/user/{id}', [UserController::class, 'delete'])->name('delete');

Route:: put('/user/{id}/put', [UserController::class, 'update'])->name('update');

Route::post('/userdata', [UserController::class, 'store'])->name('store');
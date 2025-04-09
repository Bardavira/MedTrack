<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/user', [UserControler::class, 'index'])->name('index');

Route::get('/user/{id}', [Usercontroller::class, 'destroy'])->name('destroy');

Route::get('/user/{id}', [UserController::class. 'upgrade'])->name('upgrade');
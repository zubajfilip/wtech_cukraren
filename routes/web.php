<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/penis', function () {
    return view('penis');
});

Route::resource('users', UserController::class);
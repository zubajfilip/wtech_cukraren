<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DonutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/penis', function () {
    return view('penis');
});

Route::resource('users', UserController::class);

Route::resource('home', ProductController::class)->names([
    'index' => 'home'
]);

Route::resource('donuts', DonutController::class)->names([
    'index' => 'donuts'
]);

Route::resource('login', LoginController::class)->names([
    'index' => 'login'
]);

Route::resource('register', RegisterController::class)->names([
    'index' => 'register'
]);
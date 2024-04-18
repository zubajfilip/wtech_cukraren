<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DonutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Cart1Controller;
use App\Http\Controllers\Cart2Controller;
use App\Http\Controllers\Cart3Controller;



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

Route::resource('cart1', Cart1Controller::class)->names([
    'index' => 'cart1'
]);

Route::resource('cart2', Cart2Controller::class)->names([
    'index' => 'cart2'
]);

Route::resource('cart3', Cart3Controller::class)->names([
    'index' => 'cart3'
]);

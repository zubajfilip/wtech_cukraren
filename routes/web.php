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
use App\Http\Controllers\SearchController;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', UserController::class);

Route::resource('home', ProductController::class);

Route::resource('donuts', DonutController::class);

Route::resource('login', LoginController::class);

Route::resource('register', RegisterController::class);

Route::resource('cart1', Cart1Controller::class);

Route::resource('cart2', Cart2Controller::class);

Route::resource('cart3', Cart3Controller::class);

Route::get('/search', [SearchController::class, 'search'])->name('search');


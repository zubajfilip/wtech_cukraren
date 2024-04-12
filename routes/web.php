<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DonutController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/penis', function () {
    return view('penis');
});

Route::resource('users', UserController::class);

Route::resource('home', ProductController::class);

Route::resource('donuts', DonutController::class)->names([
    'index' => 'donuts'
]);;

// Route::get('donuts', 'DonutController@index')->name('donuts');

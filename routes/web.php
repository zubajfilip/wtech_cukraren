<?php

use App\Http\Controllers\ProfileController;
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
use App\Http\Controllers\ShoppingCartController;
use App\Http\Middleware\LoadCartData;
use App\Http\Controllers\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', UserController::class);

Route::resource('home', ProductController::class);

Route::post('/purchase', [ShoppingCartController::class, 'purchase'])->name('purchase');

Route::post('/increase_product_quantity', [ShoppingCartController::class, 'increaseProductQuantity'])->name('increase_product_quantity');

Route::post('/decrease_product_quantity', [ShoppingCartController::class, 'decreaseProductQuantity'])->name('decrease_product_quantity');


// Route::post('/remove_item', [ShoppingCartController::class, 'removeItem'])->name('remove_item');
Route::post('/remove-item/{productId}', [ShoppingCartController::class, 'removeItem'])->name('remove_item');



Route::resource('donuts', DonutController::class);

Route::resource('login', LoginController::class);

Route::resource('register', RegisterController::class);

// Route::get('/cart1', [ShoppingCartController::class, 'index']);

Route::resource('cart1', ShoppingCartController::class);

Route::resource('cart2', Cart2Controller::class);

Route::resource('cart3', Cart3Controller::class);

Route::get('/search', [SearchController::class, 'search'])->name('search');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



require __DIR__.'/auth.php';



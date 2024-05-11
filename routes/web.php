<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DonutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Cart1Controller;
use App\Http\Controllers\Cart2Controller;
use App\Http\Controllers\Cart3Controller;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\AdminController;
use App\Http\Middleware\LoadCartData;
use App\Http\Controllers\Auth;
use App\Http\Middleware\AdminAccessMiddleware;

// Route::post('/purchase', [ShoppingCartController::class, 'purchase'])->name('purchase')->middleware(PurchaseAccessMiddleware::class);



// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('users', UserController::class);

// Route::resource('admins', AdminController::class);

// Route::get('searchadmin', [AdminController::class, 'search'])->name('searchadmin');

Route::get('/cart2', [OrderController::class, 'index'])->name('cart2');

Route::post('/cart3', [OrderController::class, 'pay_and_delivery'])->name('cart3');

Route::post('/final', [OrderController::class, 'handle_order'])->name('handle_order');

Route::resource('/', ProductController::class);

Route::post('/purchase', [ShoppingCartController::class, 'purchase'])->name('purchase');

Route::post('/increase_product_quantity', [ShoppingCartController::class, 'increaseProductQuantity'])->name('increase_product_quantity');

Route::post('/decrease_product_quantity', [ShoppingCartController::class, 'decreaseProductQuantity'])->name('decrease_product_quantity');

Route::get('/product_filter', [ProductController::class, 'filter'])->name('product_filter');

Route::post('/remove-item/{productId}', [ShoppingCartController::class, 'removeItem'])->name('remove_item');

Route::resource('donuts', DonutController::class);

// Route::get('/donuts', [DonutController::class, 'index'])->name('donuts.index');


Route::resource('login', LoginController::class);

Route::resource('register', RegisterController::class);

// Route::get('/cart1', [ShoppingCartController::class, 'index']);

Route::resource('cart1', ShoppingCartController::class);

Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware([AdminAccessMiddleware::class])->group(function () {
    Route::resource('admins', AdminController::class);
    Route::get('searchadmin', [AdminController::class, 'search'])->name('searchadmin');
});

// Admin stuff below
// Route::middleware('auth')->group(function () {
//     Route::post('/add_new_product', [ProductController::class, 'addProduct'])->name('add_new_product');
//     Route::post('/add_product_category', [ProductController::class, 'addProductCategory'])->name('add_product_category');
// });


require __DIR__.'/auth.php';



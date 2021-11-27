<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;


Route::get('/', [MainController::class, 'index'])->name('index');
Route::get('/categories/', [MainController::class, 'categories'])->name('categories');
Route::get('/categories/{cat_name}', [MainController::class, 'category'])->name('category');
Route::get('/categories/{cat_name}/{product}', [MainController::class, 'product_view'])->name('category');

Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::post('/cart/add/{id}', [CartController::class, 'cartAdd'])->name('cartAdd');
Route::post('/cart/remove/{id}', [CartController::class, 'cartRemove'])->name('cartRemove');
Route::post('/cart/checkout', [CartController::class, 'checkout'])->name('cartCheckout');
Route::post('/cart/checkoutConfirm', [CartController::class, 'checkoutConfirm'])->name('checkoutConfirm');

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'locale'], function () {
    Route::get('/login', [AuthController::class, 'index'])->name(ROUTE_LOGIN);
    Route::get('/register', [AuthController::class, 'create'])->name(ROUTE_REGISTER);

    Route::get('/', [HomeController::class, 'index'])->name(ROUTE_HOME_INDEX);

    Route::prefix('product')->group(function () {
        Route::get('', [ProductController::class, 'index'])->name(ROUTE_PRODUCT_INDEX);
        Route::get('detail/{id}', [ProductController::class, 'show'])->name(ROUTE_PRODUCT_DETAIL);
    });

    Route::get('/cart', [CartController::class, 'index'])->name(ROUTE_CART_INDEX);
    Route::get('/checkout', [CheckoutController::class, 'index'])->name(ROUTE_CHECKOUT_INDEX);

    Route::prefix('blog')->group(function () {
        Route::get('', [BlogController::class, 'index'])->name(ROUTE_BLOG_INDEX);
        Route::get('detail/{id}', [BlogController::class, 'show'])->name(ROUTE_BLOG_DETAIL);
    });

    Route::prefix('contact')->group(function () {
        Route::get('', [ContactController::class, 'index'])->name(ROUTE_CONTACT_INDEX);
    });
});

<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin', 'middleware' => 'locale'], function () {
    Route::get('login', [AuthController::class, 'indexAdmin'])->name(ROUTE_ADMIN_LOGIN);
    Route::post('login', [AuthController::class, 'loginAdmin'])->name(ROUTE_ADMIN_CHECK_LOGIN);
    Route::get('logout', [AuthController::class, 'logoutAdmin'])->name(ROUTE_ADMIN_LOGOUT);

    Route::group(['middleware' => 'auth:admin'], function () {
        Route::get('', [HomeController::class, 'indexAdmin'])->name(ROUTE_ADMIN_HOME_INDEX);
    });
});

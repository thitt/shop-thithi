<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
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

        Route::prefix('category')->group(function () {
            Route::get('', [CategoryController::class, 'indexAdmin'])->name(ROUTE_ADMIN_CATEGORY_LIST);
            Route::get('create', [CategoryController::class, 'createAdmin'])->name(ROUTE_ADMIN_CATEGORY_CREATE);
            Route::post('store', [CategoryController::class, 'storeAdmin'])->name(ROUTE_ADMIN_CATEGORY_STORE);
            Route::get('edit/{id}', [CategoryController::class, 'editAdmin'])->name(ROUTE_ADMIN_CATEGORY_EDIT);
            Route::post('update/{id}', [CategoryController::class, 'updateAdmin'])->name(ROUTE_ADMIN_CATEGORY_UPDATE);
            Route::get('delete/{id}', [CategoryController::class, 'deleteAdmin'])->name(ROUTE_ADMIN_CATEGORY_DELETE);
        });

        Route::prefix('product')->group(function () {
            Route::get('', [ProductController::class, 'indexAdmin'])->name(ROUTE_ADMIN_PRODUCT_LIST);
            Route::get('create', [ProductController::class, 'createAdmin'])->name(ROUTE_ADMIN_PRODUCT_CREATE);
            Route::post('store', [ProductController::class, 'storeAdmin'])->name(ROUTE_ADMIN_PRODUCT_STORE);
            Route::get('edit/{id}', [ProductController::class, 'editAdmin'])->name(ROUTE_ADMIN_PRODUCT_EDIT);
            Route::post('update/{id}', [ProductController::class, 'updateAdmin'])->name(ROUTE_ADMIN_PRODUCT_UPDATE);
            Route::get('delete/{id}', [ProductController::class, 'deleteAdmin'])->name(ROUTE_ADMIN_PRODUCT_DELETE);
        });
    });
});

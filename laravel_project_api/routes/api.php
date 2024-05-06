<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductsController;
use App\Http\Controllers\Api\UsersController;
use App\Http\Controllers\Api\WelcomeController;
use App\Http\Controllers\Api\CategoryController;

//Route::prefix('v1')->group(function () {
//
//    Route::get('/user', function (Request $request) {
//        return $request->user();
//    })->middleware('auth:sanctum');
//});

Route::prefix('v1')->group(function () {

    Route::Resource('welcome', WelcomeController::class);
    Route::get('/welcome/category/{id}', [WelcomeController::class, 'welcomecategory']
    )->name('welcome.category');

    Route::Resource('products', ProductsController::class)->middleware('auth:sanctum');

    Route::Resource('users', UsersController::class)->middleware('auth:sanctum');
    Route::post('/users/register', UsersController::class . '@store')->name('register.user');
    Route::post('/users/login', UsersController::class . '@login')->name('login.user');

    Route::Resource('categories', CategoryController::class)->middleware('auth:sanctum');
});

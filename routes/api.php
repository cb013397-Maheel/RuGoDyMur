<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//login routes
Route::post('/auth/login', [APIController::class, 'login'])->name('auth.login');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/auth/logout', [APIController::class, 'logout'])->name('logout');

    // Products
    Route::get('/products', [APIController::class, 'getProducts'])->name('products.index');
    Route::get('/products/{id}', [APIController::class, 'getProduct'])->name('products.show');
    Route::post('/products/add', [APIController::class, 'createProduct'])->name('products.store');
});

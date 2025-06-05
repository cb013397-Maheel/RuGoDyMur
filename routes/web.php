<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

});

Route::post('/login', [LoginController::class, 'login']);

Auth::routes();

Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [CustomerController::class, 'index'])->name('home');

    //Product
    Route::get('/product/show/{id}', [ProductController::class, 'show'])->name('product.show');
    Route::get('/products', [CustomerController::class, 'productsIndex'])->name('products.index');

    //cart
    Route::get('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
    Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('checkout');

    //Order
    Route::post('/order', [OrderController::class, 'checkout'])->name('order.checkout');
    Route::get('/customer/orders', [OrderController::class, 'index'])->name('customer.orders.index');
});


Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.index');

    //Admin User Controllers
    Route::get('/admin/dashboard'  ,[AdminController::class, 'index'])->name('dashboard');
    Route::get('admin/user/create', [AdminController::class, 'create'])->name('user.create');
    Route::post('admin/user/store', [AdminController::class, 'store'])->name('user.store');
    //Category Crud
    Route::get('admin/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('admin/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('admin/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('admin/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('admin/category/{id}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('admin/category/{id}/delete', [CategoryController::class, 'destroy'])->name('category.destroy');
    // Product Crud
    Route::get('admin/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('admin/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('admin/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('admin/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::put('admin/product/{id}/update', [ProductController::class, 'update'])->name('product.update');
    Route::delete('admin/product/{id}/delete', [ProductController::class, 'destroy'])->name('product.destroy');

    // Order Management
    Route::get('admin/orders', [AdminController::class, 'orderindex'])->name('admin.orders.index');
    Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('order.updateStatus');

});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\admin\product\CategoryController;
use App\Http\Controllers\admin\product\ProductController;

use App\Http\Controllers\admin\manegement\RoleController;
use App\Http\Controllers\admin\manegement\UserController;

use App\Http\Controllers\admin\storage\XuatController;
use App\Http\Controllers\admin\storage\NhapController;
use App\Http\Controllers\admin\storage\TonKhoController;
// //Route shop (trang shop)
Route::get('/shop', function () {
    return view('shop');
})->name ('shop');

Route::get('/shop/category', function () {
    return view('shop/category/shop-category');
})->name ('shop-category');

Route::get('/shop/product', function () {
    return view('shop/product/shop-product');
})->name ('shop-product');

Route::get('/shop/product/cart', function () {
    return view('shop/product/shop-cart');
})->name ('shop-cart');

// 
Auth::routes();

// Trang chủ require login
Route::middleware('auth')->get('/', function () {
    return view('index');
})->name('home');

// Route::middleware('auth')->prefix('admin')->group(function () {

    // Dashboard
    Route::get('dashboard', [AdminController::class, 'dashboard'])
        ->name('dashboard');

//     // Product
//     Route::get('product/product', [AdminController::class, 'productlist'])
//         ->name('product-product');

//     Route::get('product/category', [AdminController::class, 'categorylist'])
//         ->name('product-category');

//     // Storage
//     Route::get('storage/nhapkho', [AdminController::class, 'storagenhapkho'])
//         ->name('storage-nhapkho');

//     Route::get('storage/xuatkho', [AdminController::class, 'storagexuatkho'])
//         ->name('storage-xuatkho');

//     Route::get('storage/trongkho', [AdminController::class, 'storagetrongkho'])
//         ->name('storage-trongkho');

    Route::get('storage/lichsukho', [AdminController::class, 'storagelichsukho'])
        ->name('storage-lichsukho');

//     // Management
//     Route::get('management/user', [AdminController::class, 'manegementuser'])
//         ->name('manegement-user');

//     Route::get('management/role', [AdminController::class, 'manegementrole'])
//         ->name('manegement-role');
// });

//Tuan 9

Route::prefix('product')->group(function () {
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
});

Route::prefix('management')->group(function () {
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
});

Route::prefix('storage')->group(function () {
    Route::resource('xuat', XuatController::class);
    Route::resource('nhap', NhapController::class);
    Route::resource('tonkho', TonKhoController::class);
});
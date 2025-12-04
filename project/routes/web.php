<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\ProductController;

use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;

use App\Http\Controllers\admin\XuatController;
use App\Http\Controllers\admin\NhapController;
use App\Http\Controllers\admin\TonKhoController;

// //Route shop (trang shop)
Route::get('/shop', [\App\Http\Controllers\ShopController::class, 'index'])->name('shop');


// 
Auth::routes();

// Trang chủ require login
Route::middleware('auth')->get('/', function () {
    return view('index');
})->name('home');


    // Dashboard
    Route::get('dashboard', [AdminController::class, 'dashboard'])
        ->name('dashboard');

    Route::get('storage/lichsukho', [AdminController::class, 'storagelichsukho'])
        ->name('storage-lichsukho');

//Tuan 9

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('user', UserController::class);
    Route::resource('role', RoleController::class);
    Route::resource('xuat', XuatController::class);
    Route::resource('nhap', NhapController::class);
    Route::resource('tonkho', TonKhoController::class);
});

Route::post('admin/user/restore/{id}', [UserController::class, 'restore'])->name('admin.user.restore');

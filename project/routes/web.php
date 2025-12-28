<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\XuatController;
use App\Http\Controllers\Admin\NhapController;
use App\Http\Controllers\Admin\TonKhoController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\SettingController;
/* PUBLIC*/
// Trang shop (ai cũng xem được)
Route::get('/', [ShopController::class, 'index'])->name('shop');

// Auth mặc định Laravel
Auth::routes();

/* ADMIN (chỉ admin) */
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth', 'role:admin,superadmin'])
    ->group(function () {

        // Trang chính admin
        Route::get('/dashboard', [AdminController::class, 'dashboard'])
            ->name('dashboard');
        Route::get('/storage/lichsukho', [AdminController::class, 'storagelichsukho'])
            ->name('storage-lichsukho');

        // Resource
        Route::resource('category', CategoryController::class);
        Route::resource('product', ProductController::class);
        Route::resource('user', UserController::class);
        Route::get('user/create', [UserController::class, 'create'])->name('user.create');
        Route::resource('xuat', XuatController::class);
        Route::resource('nhap', NhapController::class);
        Route::resource('tonkho', TonKhoController::class);

        // Restore user
        Route::post('user/restore/{id}', [UserController::class, 'restore'])
            ->name('user.restore');
        Route::post('product/restore/{id}', [ProductController::class, 'restore'])
            ->name('product.restore');
        Route::post('category/restore/{id}', [CategoryController::class, 'restore'])
            ->name('category.restore');
    });

/* GOOGLE LOGIN */
Route::get('/auth/google', [GoogleController::class, 'redirect'])
    ->name('google.login');

Route::get('/auth/google/callback', [GoogleController::class, 'callback']);


//Bổ sung about us
// User
Route::get('/about', [AboutController::class, 'index'])->name('shop.about');

// Admin
Route::get('/admin/about', [AboutController::class, 'edit'])->name('admin.about.edit');
Route::post('/admin/about', [AboutController::class, 'update'])->name('admin.about.update');



//Bổ sung cài đặt chỉnh sửa logo, tên admin
Route::get('/setting', [SettingController::class, 'index'])
     ->name('setting');

Route::post('/setting', [SettingController::class, 'update'])
     ->name('setting.update');
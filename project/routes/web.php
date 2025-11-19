<?php

use Illuminate\Support\Facades\Route;

//Route home (trang admin)
Route::get('/', function () {
    return view('index');
})->name ('home');

//Route của product
Route::get('admin/product/product', function () {
    return view('admin/product/product-list');
})->name ('product-product');

Route::get('admin/product/category', function () {
    return view('admin/product/category-list');
})->name ('product-category');

//Route của storage
Route::get('admin/storage/nhapkho', function () {
    return view('admin/storage/nhapkho-list');
})->name ('storage-nhapkho');

Route::get('admin/storage/xuatkho', function () {
    return view('admin/storage/xuatkho-list');
})->name ('storage-xuatkho');

Route::get('admin/storage/trongkho', function () {
    return view('admin/storage/trongkho-list');
})->name ('storage-trongkho');

Route::get('admin/storage/lichsukho', function () {
    return view('admin/storage/lichsukho');
})->name ('storage-lichsukho');

//Route của management
Route::get('admin/manegement/user', function () {
    return view('admin/manegement/user-list');
})->name ('manegement-user');

Route::get('admin/manegement/role', function () {
    return view('admin/manegement/role-list');
})->name ('manegement-role');


//Route shop (trang shop)
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
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

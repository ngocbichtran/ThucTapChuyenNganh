<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/category', function () {
    return view('category');
});
Route::get('/product', function () {
    return view('product');
});
Route::get('/icon', function () {
    return view('icon');
});
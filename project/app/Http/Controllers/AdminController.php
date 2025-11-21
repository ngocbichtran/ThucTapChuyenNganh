<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    //
    public function dashboard() {
        return view('admin.dashboard');
    }

    //Product
    public function productlist() {
        $products = Product::all();
        return view('admin.product.product-list',compact('products'));
    }

    public function categorylist() {
        $categories = Category::all();
        return view('admin.product.category-list',compact('categories'));
    }

    //Storage
    public function storagenhapkho() {
        return view('admin.storage.nhapkho-list');
    }

    public function storagexuatkho() {
        return view('admin.storage.xuatkho-list');
    }

    public function storagetrongkho() {
        return view('admin.storage.trongkho-list');
    }

       public function storagelichsukho() {
        return view('admin.storage.lichsukho');
    }

    //Management
    public function manegementuser() {
        $users = User::all(); // lấy danh sách user
        return view('admin.manegement.user-list', compact('users'));
    }

    public function manegementrole() {
        return view('admin.manegement.role-list');
    }
    
}

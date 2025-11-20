<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    //
    public function dashboard() {
        return view('admin.dashboard');
    }

    //Product
    public function productlist() {
        return view('admin.product.product-list');
    }

    public function categorylist() {
        return view('admin.product.category-list');
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

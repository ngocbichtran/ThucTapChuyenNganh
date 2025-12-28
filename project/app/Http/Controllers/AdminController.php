<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
class AdminController extends Controller
{
public function dashboard()
{
    return view('admin.dashboard', [
        'totalCategories' => Category::count(),
        'totalProducts'   => Product::count(),
        'totalUsers'      => User::count(),
    ]);
}


}

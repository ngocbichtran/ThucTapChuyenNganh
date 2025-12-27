<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ShopController extends Controller
{
    /**
     * Trang shop – hiển thị danh sách sản phẩm + lọc + tìm kiếm + sort
     */
    public function index(Request $request)
    {
        // Lấy dữ liệu lọc
        $categoryId = $request->category;   // lọc theo danh mục
        $keyword    = $request->keyword;    // tìm kiếm
        $sort       = $request->sort;       // sắp xếp giá

        // Danh sách danh mục
        $categories = Category::orderBy('TYPE')->get();

        // Query sản phẩm
        $query = Product::with('category')->where('ACTIVE_FLAG', 1);

        // Lọc theo danh mục
        if (!empty($categoryId)) {
            $query->where('CATEGORY_ID', $categoryId);
        }

        // Tìm kiếm theo tên
        if (!empty($keyword)) {
            $query->where('NAME', 'LIKE', '%' . $keyword . '%');
        }

        // Sort theo giá
        if ($sort == 'price_asc') {
            $query->orderBy('PRICE', 'asc');
        } elseif ($sort == 'price_desc') {
            $query->orderBy('PRICE', 'desc');
        } else {
            $query->orderBy('ID', 'desc');
        }

        // Phân trang
        $products = $query->paginate(12);

        return view('shop', compact(
            'products',
            'categories',
            'categoryId',
            'keyword',
            'sort'
        ));
        return view('shop', compact('products'));
    }


    /**
     * Trang chi tiết sản phẩm
     */
    public function detail($id)
    {
        $product = Product::with('category')->findOrFail($id);

        // Sản phẩm liên quan (cùng danh mục)
        $related = Product::where('CATEGORY_ID', $product->CATEGORY_ID)
                        ->where('ID', '!=', $product->ID)
                        ->limit(4)
                        ->get();

        return view('shop', compact('product', 'related'));
    }

     public function about()
    {
        return view('shop.product.shop-about');
    }
}

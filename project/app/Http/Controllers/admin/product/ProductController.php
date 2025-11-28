<?php

namespace App\Http\Controllers\admin\product;

use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // LIST
    public function index()
    {
        $product = Product::all();
        return view('admin.product.product-list', compact('product'));
    }

    // CREATE
    public function create()
    {
        $categoryList = Category::all();
        return view('admin.product.add', compact('categoryList'));
    }

    // STORE
    public function store(Request $request)
    {
        $product = Product::create([
            'CATE_ID'      => $request->CATE_ID,
            'NAME'         => $request->NAME,
            'DESCRIPTION'  => $request->DESCRIPTION,
            'IMG_URL'      => $request->IMG_URL,
            'ACTIVE_FLAG'  => $request->ACTIVE_FLAG,
            'CREATE_DATE'  => now(),
        ]);

        if($product){
            return redirect()->route('product.index')
                ->with('success', 'Thêm sản phẩm thành công!');
        }

        return back()->with('error', 'Thêm sản phẩm thất bại!');
    }

    // EDIT
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.product.editProduct', compact('product','categories'));
    }

    // UPDATE
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $updated = $product->update([
            'CATE_ID'      => $request->CATE_ID,
            'NAME'         => $request->NAME,
            'DESCRIPTION'  => $request->DESCRIPTION,
            'IMG_URL'      => $request->IMG_URL,
            'ACTIVE_FLAG'  => $request->ACTIVE_FLAG,
            'UPDATE_DATE'  => now(),
        ]);

        if($updated){
            return redirect()->route('product.index')
                ->with('success', 'Cập nhật thành công!');
        }

        return back()->with('error', 'Cập nhật thất bại!');
    }

    // DELETE
    public function destroy(string $id)
    {
        Product::where('ID', $id)->delete();

        return redirect()->route('product.index')
            ->with('success', 'Xóa sản phẩm thành công!');
    }
}

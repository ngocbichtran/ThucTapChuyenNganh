<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // LIST
    public function index(Request $request)
    {
        $status  = $request->input('status');
        $keyword = $request->input('keyword');

        // Bắt đầu query
        $query = Product::query();

        // Lọc trạng thái
        if ($status === 'trash') {
            $query->onlyTrashed();
        } else {
            $query->withoutTrashed();

            // Tìm kiếm
            if ($keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('NAME', 'LIKE', '%' . $keyword . '%')
                      ->orWhere('DESCRIPTION', 'LIKE', '%' . $keyword . '%');
                });
            }
        }

        // Phân trang
        $products = $query->paginate(4)->withQueryString();

        // Đếm trạng thái
       $count = [
            'all'   => Product::count(),
            'trash' => Product::onlyTrashed()->count(),
            'active'   => Product::where('ACTIVE_FLAG', 1)->count(),
            'inactive' => Product::where('ACTIVE_FLAG', 0)->count(),
        ];

        return view('admin.product.index', compact('products', 'keyword', 'count', 'status'));
    }

    // CREATE
    public function create()
    {
        $categoryList = Category::all();
        return view('admin.product.create', compact('categoryList'));
    }

    // STORE
    public function store(Request $request)
    {
        $request->validate([
            'CATE_ID'      => 'required|exists:category,ID',
            'NAME'         => 'required|min:3|max:100',
            'DESCRIPTION'  => 'nullable|max:500',
            'PRICE'=>'required',
            'IMG_URL' => 'required',
            'ACTIVE_FLAG'  => 'required|in:0,1',
        ], [
            'CATE_ID.required' => 'Vui lòng chọn loại sản phẩm.',
            'CATE_ID.exists'   => 'Loại sản phẩm không hợp lệ.',
            'NAME.required'    => 'Tên sản phẩm không được để trống.',
            'NAME.min'         => 'Tên phải có ít nhất 3 ký tự.',
            'PRICE.required'=>'Vui lòng nhập giá.',
            'IMG_URL.required'  => 'Vui lòng cung cấp URL hình ảnh.',
            'ACTIVE_FLAG.in'   => 'Trạng thái không hợp lệ.',
        ]);

        // INSERT
        $product = Product::create([
            'CATE_ID'      => $request->CATE_ID,
            'NAME'         => $request->NAME,
            'DESCRIPTION'  => $request->DESCRIPTION,
            'PRICE'=> $request->PRICE,
            'IMG_URL'      => $request->IMG_URL,
            'ACTIVE_FLAG'  => $request->ACTIVE_FLAG,
            'CREATE_DATE'  => now(),
        ]);

        if($product){
            return redirect()->route('admin.product.index')
                ->with('success', 'Thêm sản phẩm thành công!');
        }

        return back()->with('error', 'Thêm sản phẩm thất bại!');
    }

    // EDIT
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('admin.product.edit', compact('product','categories'));
    }

    // UPDATE
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $updated = $product->update([
            'CATE_ID'      => $request->CATE_ID,
            'NAME'         => $request->NAME,
            'DESCRIPTION'  => $request->DESCRIPTION,
            'PRICE'=> $request->PRICE,
            'IMG_URL'      => $request->IMG_URL,
            'ACTIVE_FLAG'  => $request->ACTIVE_FLAG,
            'UPDATE_DATE'  => now(),
        ]);

        if($updated){
            return redirect()->route('admin.product.index')
                ->with('success', 'Cập nhật thành công!');
        }

        return back()->with('error', 'Cập nhật thất bại!');
    }

    // DELETE
    public function destroy(string $id)
    {
        Product::where('ID', $id)->delete();

        return redirect()->route('admin.product.index')
            ->with('success', 'Xóa sản phẩm thành công!');
    }
}

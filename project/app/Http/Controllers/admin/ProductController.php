<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    // LIST
    public function index(Request $request)
    {
        $status  = $request->input('status', 'all');
        $keyword = $request->input('keyword');

        $query = Product::query();

        if ($status === 'trash') {
            $query->onlyTrashed();
        } else {
            $query->withoutTrashed();

            if ($status === 'active') {
                $query->where('ACTIVE_FLAG', 1);
            }

            if ($status === 'inactive') {
                $query->where('ACTIVE_FLAG', 0);
            }

            if ($keyword) {
                $query->where(function ($q) use ($keyword) {
                    $q->where('NAME', 'LIKE', "%$keyword%")
                      ->orWhere('DESCRIPTION', 'LIKE', "%$keyword%");
                });
            }
        }

        // Phân trang
        $products = $query
            ->paginate(2)
            ->withQueryString();

        // Đếm
        $count = [
            'all'      => Product::withoutTrashed()->count(),
            'active'   => Product::withoutTrashed()->where('ACTIVE_FLAG', 1)->count(),
            'inactive' => Product::withoutTrashed()->where('ACTIVE_FLAG', 0)->count(),
            'trash'    => Product::onlyTrashed()->count(),
        ];

        return view(
            'admin.product.index',
            compact('products', 'keyword', 'count', 'status')
        );
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
            'CATE_ID'     => 'required|integer|exists:category,ID',
            'NAME'        => 'required|string|max:190',
            'DESCRIPTION' => 'nullable|string',
            'PRICE'       => 'required|integer',
            'IMG_URL'     => 'nullable|string|max:200',
            'ACTIVE_FLAG' => 'required|integer|in:0,1',
        ]);

        Product::create([
            'CATE_ID'     => $request->CATE_ID,
            'NAME'        => $request->NAME,
            'DESCRIPTION' => $request->DESCRIPTION,
            'PRICE'       => $request->PRICE,
            'IMG_URL'     => $request->IMG_URL,
            'ACTIVE_FLAG' => $request->ACTIVE_FLAG,
            'CREATE_DATE' => now(),
        ]);

        return redirect()
            ->route('admin.product.index')
            ->with('success', 'Thêm sản phẩm thành công!');
    }

    // EDIT
    public function edit($id)
    {
        $product    = Product::findOrFail($id);
        $categories = Category::all();

        return view('admin.product.edit', compact('product', 'categories'));
    }

    // UPDATE
public function update(Request $request, $id)
{
    $about = About::findOrFail($id);

    $request->validate([
        'tieuDe'           => 'required|string|max:255',
        'moTa'             => 'required|string',
        'gioiThieu'        => 'required|string',
        'huongPhatTrien'   => 'required|string',
        'hinhAnh'          => 'nullable|image|max:2048',
    ]);

    $data = [
        'tieuDe'         => $request->tieuDe,
        'moTa'           => $request->moTa,
        'gioiThieu'      => $request->gioiThieu,
        'huongPhatTrien' => $request->huongPhatTrien,
    ];

    // Upload ảnh
    if ($request->hasFile('hinhAnh')) {
        if ($about->hinhAnh && Storage::disk('public')->exists($about->hinhAnh)) {
            Storage::disk('public')->delete($about->hinhAnh);
        }

        $data['hinhAnh'] = $request->file('hinhAnh')->store('about', 'public');
    }

    $about->update($data);

    return redirect()
        ->route('admin.about.edit', $about->id)
        ->with('success', 'Cập nhật trang About thành công!');
}
    // SOFT DELETE
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()
            ->route('admin.product.index')
            ->with('success', 'Đã chuyển sản phẩm vào thùng rác!');
    }

    // RESTORE
    public function restore($id)
    {
        $product = Product::onlyTrashed()->find($id);

        if (!$product) {
            return back()->with('error', 'Sản phẩm không tồn tại!');
        }

        $product->restore();

        return back()->with('success', 'Khôi phục sản phẩm thành công!');
    }
}

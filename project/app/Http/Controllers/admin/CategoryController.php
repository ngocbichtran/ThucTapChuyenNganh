<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $keyword = $request->keyword;
        $status  = $request->status;

        // Query theo trạng thái
        if ($status == 'trash') {
            $query = Category::onlyTrashed();
        } else {
            $query = Category::query();
        }

        // Tìm kiếm
        if ($keyword) {
            $query->where('TYPE', 'LIKE', "%$keyword%");
        }

        // Phân trang
        $categories = $query->orderBy('ID', 'DESC')
                          ->paginate(5)
                          ->withQueryString();

        // Đếm số lượng
       $count = [
        'all'    => Category::count(), 
        'trash'  => Category::onlyTrashed()->count(),

        'active' => Category::where('ACTIVE_FLAG', 1)->count(),
        'inactive' => Category::where('ACTIVE_FLAG', 0)->count(),
        ];

        return view('admin.category.index', compact('categories', 'keyword', 'count', 'status'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'TYPE'        => 'required',
            'DESCRIPTION' => 'nullable',
            'ACTIVE_FLAG' => 'required'
        ]);

        Category::create([
            'TYPE'        => $request->TYPE,
            'DESCRIPTION' => $request->DESCRIPTION,
            'ACTIVE_FLAG' => $request->ACTIVE_FLAG,
            'CREATE_DATE' => now(),
            'UPDATE_DATE' => now(),
        ]);

        return redirect()
            ->route('admin.category.index')
            ->with('success', 'Thêm category thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.product.showCategory', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('admin.product.editCategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $category->update([
            'TYPE'        => $request->TYPE,
            'DESCRIPTION' => $request->DESCRIPTION,
            'ACTIVE_FLAG' => $request->ACTIVE_FLAG,
            'UPDATE_DATE' => now(),
        ]);
        if($category)
            return redirect()->route('admin.category.index')->with('success', 'Cập nhật category thành công!');
        else
            return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    try {
        Category::where('ID', $id)->delete();
        return redirect()
            ->route('admin.category.index')
            ->with('success', 'Xóa category thành công!');
    } catch (\Illuminate\Database\QueryException $e) {
        return redirect()
            ->route('admin.category.index')
            ->with('error', 'Không thể xoá vì category đang được sử dụng trong sản phẩm!');
    }
}
}

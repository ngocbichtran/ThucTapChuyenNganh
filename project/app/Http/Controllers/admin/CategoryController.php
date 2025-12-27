<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //LIST
    public function index(Request $request)
    {
        $status  = $request->input('status');
        $keyword = $request->input('keyword');

        // Query gốc
        $query = Category::query();

        // Lọc thùng rác
        if ($status === 'trash') {
            $query->onlyTrashed();
        }

        // Tìm kiếm
        if ($keyword) {
            $query->where('TYPE', 'LIKE', "%{$keyword}%");
        }

        // Phân trang
        $categories = $query
            ->orderBy('ID', 'DESC')
            ->paginate(4)
            ->withQueryString();

        // Đếm trạng thái
        $count = [
            'all'      => Category::withTrashed()->count(),
            'active'   => Category::where('ACTIVE_FLAG', 1)->count(),
            'inactive' => Category::where('ACTIVE_FLAG', 0)->count(),
            'trash'    => Category::onlyTrashed()->count(),
        ];

        return view(
            'admin.category.index',
            compact('categories', 'keyword', 'count', 'status')
        );
    }

    //CREATE
    public function create()
    {
        return view('admin.category.create');
    }

    //STORE
    public function store(Request $request)
    {
        $request->validate([
            'TYPE'        => 'required|string|max:190',
            'DESCRIPTION' => 'nullable|string',
            'ACTIVE_FLAG' => 'required|in:0,1',
        ]);

        Category::create([
            'TYPE'        => $request->TYPE,
            'DESCRIPTION' => $request->DESCRIPTION,
            'ACTIVE_FLAG' => $request->ACTIVE_FLAG,
            'CREATE_DATE' => now(),
        ]);

        return redirect()
            ->route('admin.category.index')
            ->with('success', 'Thêm category thành công!');
    }

    //EDIT
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);

        return view('admin.category.edit', compact('category'));
    }

    //UPDATE
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'TYPE'        => 'required|string|max:190',
            'DESCRIPTION' => 'nullable|string',
            'ACTIVE_FLAG' => 'required|in:0,1',
        ]);

        $category->update([
            'TYPE'        => $request->TYPE,
            'DESCRIPTION' => $request->DESCRIPTION,
            'ACTIVE_FLAG' => $request->ACTIVE_FLAG,
            'UPDATE_DATE' => now(),
        ]);

        return redirect()
            ->route('admin.category.index')
            ->with('success', 'Cập nhật category thành công!');
    }

    //DELETE (SOFT)
    public function destroy(string $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return redirect()
                ->route('admin.category.index')
                ->with('success', 'Đã chuyển category vào thùng rác!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect()
                ->route('admin.category.index')
                ->with('error', 'Không thể xoá vì category đang được sử dụng!');
        }
    }

    //RESTORE
    public function restore(string $id)
    {
        $category = Category::onlyTrashed()->findOrFail($id);
        $category->restore();

        return redirect()
            ->route('admin.category.index')
            ->with('success', 'Khôi phục category thành công!');
    }
}

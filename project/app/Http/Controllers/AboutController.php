<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Trang About phía user
     */
    public function index()
    {
        $about = About::first();
        return view('shop.product.shop-about', compact('about'));
    }

    /**
     * Trang edit About phía admin
     */
    public function edit()
    {
        $about = About::first();
        return view('admin.about.edit', compact('about'));
    }

    /**
     * Cập nhật About
     */
    public function update(Request $request)
    {
        $request->validate([
            'tieuDe' => 'required',
            'moTa' => 'required',
            'gioiThieu' => 'required',
            'huongPhatTrien' => 'required',
            'hinhAnh' => 'nullable|image|max:2048',
        ]);

 

        $data = $request->only([
            'tieuDe',
            'moTa',
            'gioiThieu',
            'huongPhatTrien'
        ]);
      $about =     About::updateOrCreate(
        ['id' => 1], 
        $data        
    );

        if ($request->hasFile('hinhAnh')) {
            // Xóa ảnh cũ nếu có
            if ($about->hinhAnh && Storage::disk('public')->exists($about->hinhAnh)) {
                Storage::disk('public')->delete($about->hinhAnh);
            }

            $data['hinhAnh'] = $request->file('hinhAnh')->store('about', 'public');
        }

        $about->update($data);

        return back()->with('success', 'Cập nhật trang About thành công');
    }
}

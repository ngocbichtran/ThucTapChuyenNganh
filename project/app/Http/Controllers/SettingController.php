<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $setting = Setting::first();

        return view('admin.setting', compact('setting'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request)
    {
        $request->validate([
            'logo_admin' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'name_admin' => 'nullable|string|max:255',
        ]);

        $setting = Setting::first() ?? new Setting();

        if ($request->filled('name_admin')) {
            $setting->name_admin = $request->name_admin;
        }

        if ($request->hasFile('logo_admin')) {
            if (!empty($setting->logo_admin)
                && Storage::disk('public')->exists($setting->logo_admin)) {
                Storage::disk('public')->delete($setting->logo_admin);
            }

            $setting->logo_admin = $request->file('logo_admin')
                                            ->store('logo', 'public');
        }

        $setting->save();

        return back()->with('success', 'Cập nhật setting thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

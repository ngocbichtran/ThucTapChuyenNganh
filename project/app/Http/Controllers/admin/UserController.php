<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /* =======================
        DANH SÁCH USER
    ======================== */
    public function index(Request $request)
    {
        $status  = $request->input('status', 'all');
        $keyword = $request->input('keyword');

        $query = User::query();

        // 🔍 Tìm kiếm
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('USER_NAME', 'LIKE', "%{$keyword}%")
                  ->orWhere('EMAIL', 'LIKE', "%{$keyword}%");
            });
        }

        // 📌 Lọc trạng thái
        switch ($status) {
            case 'trash':
                $query->onlyTrashed();
                break;

            case 'active':
                $query->where('ACTIVE_FLAG', 1);
                break;

            case 'inactive':
                $query->where('ACTIVE_FLAG', 0);
                break;

            case 'admin':
                $query->where('role', 'admin');
                break;

            case 'user':
                $query->where('role', 'user');
                break;
        }

        $users = $query->paginate(4)->withQueryString();

        // 📊 Đếm số lượng
        $count = [
            'all'      => User::count(),
            'trash'    => User::onlyTrashed()->count(),
            'active'   => User::where('ACTIVE_FLAG', 1)->count(),
            'inactive' => User::where('ACTIVE_FLAG', 0)->count(),
            'admin'    => User::where('role', 'admin')->count(),
            'user'     => User::where('role', 'user')->count(),
        ];

        return view('admin.users.index', compact(
            'users',
            'keyword',
            'count',
            'status'
        ));
    }

    /* =======================
        FORM THÊM
    ======================== */
    public function create()
    {
        return view('admin.users.create');
    }

    /* =======================
        LƯU USER
    ======================== */
   public function store(Request $request)
    {
        $request->validate([
            'USER_NAME' => 'required|min:3|unique:users,USER_NAME',
            'EMAIL'     => 'required|email|unique:users,EMAIL',
            'PASSWORD'  => 'required|min:6|same:PASSWORD_CONFIRM',
            'role'      => 'required|in:admin,user',
            'ACTIVE_FLAG' => 'required|in:0,1',
        ]);

        User::create([
            'USER_NAME'   => $request->USER_NAME,
            'PASSWORD'    => Hash::make($request->PASSWORD),
            'EMAIL'       => $request->EMAIL,
            'ACTIVE_FLAG' => $request->ACTIVE_FLAG,
            'role'        => $request->role,
            'CREATE_DATE' => now(),
            'UPDATE_DATE' => now(),
        ]);

        return redirect()->route('admin.user.index')
            ->with('success', 'Thêm user thành công!');
    }


    /* =======================
        FORM SỬA
    ======================== */
    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
    }

    /* =======================
        CẬP NHẬT
    ======================== */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'USER_NAME' => 'required|min:3|unique:users,USER_NAME,' . $user->ID . ',ID',
            'EMAIL'     => 'required|email|unique:users,EMAIL,' . $user->ID . ',ID',
            'role'      => 'nullable|in:admin,user',
        ]);

        $data = [
            'USER_NAME'   => $request->USER_NAME,
            'EMAIL'       => $request->EMAIL,
            'UPDATE_DATE' => now(),
        ];

        if (auth()->id() != $user->ID) {
            $data['role'] = $request->role;
        }

        if ($request->filled('PASSWORD')) {
            $data['PASSWORD'] = Hash::make($request->PASSWORD);
        }

        $user->update($data);

        return redirect()->route('admin.user.index')
            ->with('success', 'Cập nhật thành công!');
    }



    /* =======================
        XÓA MỀM
    ======================== */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        // Không cho xóa superadmin
        if ($user->role === 'superadmin') {
            return redirect()->back()
                ->with('error', 'Không thể vô hiệu hóa Superadmin!');
        }

        // Không cho admin tự xóa chính mình
        if (auth()->id() == $user->ID) {
            return redirect()->back()
                ->with('error', 'Bạn không thể tự vô hiệu hóa chính mình!');
        }

        // Admin thường không được xóa admin khác
        if (auth()->user()->role === 'admin' && $user->role === 'admin') {
            return redirect()->back()
                ->with('error', 'Admin không thể vô hiệu hóa Admin khác!');
        }

        $user->delete();

        return redirect()->route('admin.user.index')
            ->with('success', 'Vô hiệu hóa user thành công!');
    }


    /* =======================
        KHÔI PHỤC
    ======================== */
    public function restore($id)
    {
        $user = User::onlyTrashed()
            ->where('ID', $id)
            ->first();

        if (!$user) {
            return redirect()->back()
                ->with('error', 'Tài khoản không tồn tại hoặc không nằm trong thùng rác.');
        }

        $user->restore();

        return redirect()->back()
            ->with('success', 'Khôi phục tài khoản thành công!');
    }
}

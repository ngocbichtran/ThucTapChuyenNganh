<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $status  = $request->input('status', 'all');  // Set giá trị mặc định
        $keyword = $request->input('keyword');

        $query = User::query();

        // Tìm kiếm
        if ($keyword) {
            $query->where(function ($q) use ($keyword) {
                $q->where('USER_NAME', 'LIKE', "%$keyword%")
                ->orWhere('EMAIL', 'LIKE', "%$keyword%");
            });
        }

        // Lọc trạng thái
        if ($status === 'trash') {
            $query->onlyTrashed();
        }
        elseif ($status === 'active') {
            $query->where('ACTIVE_FLAG', 1);
        }
        elseif ($status === 'inactive') {
            $query->where('ACTIVE_FLAG', 0);
        }

        $users = $query->paginate(4)->withQueryString();

        // Đếm số lượng
        $count = [
            'all'      => User::count(),
            'trash'    => User::onlyTrashed()->count(),
            'active'   => User::where('ACTIVE_FLAG', 1)->count(),
            'inactive' => User::where('ACTIVE_FLAG', 0)->count(),
        ];

        return view('admin.users.index', compact('users', 'keyword', 'count', 'status'));
    }


    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $user = User::create([
            'USER_NAME'   => $request->USER_NAME,
            'PASSWORD'    => $request->PASSWORD,
            'EMAIL'       => $request->EMAIL,
            'ROLE_ID'     => $request->ROLE_ID,
            'ACTIVE_FLAG' => $request->ACTIVE_FLAG,
            'CREATE_DATE' => now(),
        ]);

        return redirect()->route('admin.user.index')->with(
            $user ? 'success' : 'error',
            $user ? 'Thêm user thành công!' : 'Thêm user thất bại!'
        );
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $updated = $user->update([
            'USER_NAME'   => $request->USER_NAME,
            'PASSWORD'    => $request->PASSWORD,
            'EMAIL'       => $request->EMAIL,
            'ROLE_ID'     => $request->ROLE_ID,
            'ACTIVE_FLAG' => $request->ACTIVE_FLAG,
            'UPDATE_DATE' => now(),
        ]);

        return redirect()->route('admin.user.index')->with(
            $updated ? 'success' : 'error',
            $updated ? 'Cập nhật thành công!' : 'Cập nhật thất bại!'
        );
    }

    public function destroy($id)
    {
        User::where('ID', $id)->delete();

        return redirect()->route('admin.user.index')->with('success', 'Vô hiệu hóa user thành công!');
    }

    public function restore($id)
    {
        // Tìm user trong danh sách đã xóa mềm
        $user = User::onlyTrashed()->where('id', $id)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Tài khoản không tồn tại hoặc không nằm trong thùng rác.');
        }

        // Khôi phục
        $user->restore();

        return redirect()->back()->with('success', 'Khôi phục tài khoản thành công!');
    }

}

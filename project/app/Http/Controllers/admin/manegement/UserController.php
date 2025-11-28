<?php

namespace App\Http\Controllers\admin\manegement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.manegement.user-list', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.manegement.addUser', compact('roles'));
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

        return redirect()->route('user.index')->with(
            $user ? 'success' : 'error',
            $user ? 'Thêm user thành công!' : 'Thêm user thất bại!'
        );
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('admin.manegement.editUser', compact('user', 'roles'));
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

        return redirect()->route('user.index')->with(
            $updated ? 'success' : 'error',
            $updated ? 'Cập nhật thành công!' : 'Cập nhật thất bại!'
        );
    }

    public function destroy($id)
    {
        User::where('ID', $id)->delete();

        return redirect()->route('user.index')->with('success', 'Xóa user thành công!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Hiển thị danh sách người dùng
        $users = User::paginate(10);
        return view('admin.user.index', compact('users'));
    }
    public function edit($id)
    {
        // Không cho phép admin sửa thông tin của chính mình
        if (auth()->id() == $id) {
            return redirect()->route('admin.user.index')->with('error', 'Bạn không thể sửa thông tin của chính mình!');
        }

        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Không cho phép admin thay đổi vai trò của chính mình
        if (auth()->id() == $id) {
            return redirect()->back()->with('error', 'Bạn không thể thay đổi vai trò của chính mình!');
        }

        // Validate các vai trò hợp lệ
        $data = $request->validate([
            'role' => 'required|in:admin,user,agent'
        ]);

        $user = User::findOrFail($id);
        $user->role = $data['role'];
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'Cập nhật vai trò người dùng thành công!');
    }

    public function show($id)
    {
        // Hiển thị thông tin chi tiết người dùng
        $user = User::findOrFail($id);
        return view('admin.user.show', compact('user'));
    }
}

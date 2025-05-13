<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    // Form đăng tin
    public function create()
    {
        return view('client.create');
    }

    // Xử lý lưu tin
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'address' => 'required',
            'price' => 'required|numeric',
            'area' => 'required|numeric',
            'image' => 'nullable|image|max:2048',
        ]);

        // Lưu ảnh nếu có
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('articles');
        }

        // Gán user hiện tại
        $data['user_id'] = Auth::id();

        // Tạo bản ghi
        Article::create($data);

        return redirect()->route('client.create')->with('success', 'Đăng tin thành công!');
    }
}

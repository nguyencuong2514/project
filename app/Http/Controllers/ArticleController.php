<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    // Hiển thị danh sách bài viết
    public function index()
    {
        // Lấy danh sách bài viết từ database
        $articles = Article::paginate(5);
        return view('client.article.index', compact('articles'));
    }
    // Form đăng tin
    public function create()
    {
        return view('client.article.create');
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

        return redirect()->route('client.article.create')->with('success', 'Đăng tin thành công!');
    }
}

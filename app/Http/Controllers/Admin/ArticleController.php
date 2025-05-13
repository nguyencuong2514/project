<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        // Lấy danh sách bài viết từ database
        $articles = Article::paginate(5);
        return view('admin.article.index', compact('articles'));
    }

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
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        // Gán user hiện tại
        $data['user_id'] = Auth::id();

        // Tạo bản ghi
        Article::create($data);

        return redirect()->route('admin.article.index')->with('success', 'Đăng tin thành công!');
    }
    public function create()
    {
        // Hiển thị form tạo bài viết mới
        $article = new Article();
        return view('admin.article.create', compact('article'));
    }


    public function show($id)
    {
        $article = Article::find($id);
        return view('admin.article.show', compact('article'));
    }
    public function delete($id)
    {
        // Xử lý xóa bài viết khỏi database
        $article = Article::destroy($id);
        return redirect()->route('admin.article.index')->with('success', 'Bài viết đã được xóa thành công.');
    }

    public function edit($id)
    {
        $article = Article::find($id);
        return view('admin.article.edit', ['article' => $article]);
    }
    public function update(Request $request, $id)
    {
        // Xử lý cập nhật bài viết vào database
        $article = Article::find($id);
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
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        // Gán user hiện tại
        $data['user_id'] = Auth::id();

        // Cập nhật bản ghi
        $article->update($data);

        return redirect()->route('admin.article.index')->with('success', 'Bài viết đã được cập nhật thành công.');
    }
}

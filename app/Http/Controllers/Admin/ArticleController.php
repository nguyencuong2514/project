<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('admin.article.index');
    }
    public function store(Request $request)
    {
        // Xử lý lưu bài viết mới vào database
        // ...
        return redirect()->route('admin.article.index')->with('success', 'Bài viết đã được tạo thành công.');
    }
    public function create()
    {
        return view('admin.article.create');
    }


    public function show($id)
    {
        return view('admin.article.show', ['id' => $id]);
    }
    public function delete($id)
    {
        return view('admin.article.delete', ['id' => $id]);
    }

    public function edit($id)
    {
        return view('admin.article.edit', ['id' => $id]);
    }
    public function update(Request $request, $id)
    {
        // Xử lý cập nhật bài viết vào database
        // ...
        return redirect()->route('admin.article.index')->with('success', 'Bài viết đã được cập nhật thành công.');
    }
}

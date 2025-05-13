<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        // Lấy tất cả bài viết từ database
        $client = Article::paginate(6); // Sử dụng paginate để phân trang nếu có nhiều bài viết

        // Trả về view cùng với dữ liệu bài viết
        return view('client.index', compact('client'));
    }

    public function show($id)
    {
        $client = Article::find($id);

        return view('client.show', compact('client'));
    }

    // public function create()
    // {
    //     return view('client.create');
    // }

    // public function edit($id)
    // {
    //     return view('client.edit', ['id' => $id]);
    // }
}

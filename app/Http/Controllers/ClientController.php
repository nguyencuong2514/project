<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        // Lấy tất cả bài viết từ database
        $article = Article::paginate(6); // Sử dụng paginate để phân trang nếu có nhiều bài viết
        $property = Property::all(); // Lấy tất cả bất động sản từ database
        $propertyimages = PropertyImage::all(); // Lấy tất cả hình ảnh của bất động sản
        // Trả về view cùng với dữ liệu bài viết
        return view('client.index', compact('article', 'property', 'propertyimages'));
    }

    public function showarticle($id)
    {
        $article = Article::find($id);
        return view('client.article.show', compact('article'));
    }
    public function showproperty($id)
    {

        $property = Property::find($id);
        $propertyimages = PropertyImage::where('property_id', $id)->get(); // Lấy tất cả hình ảnh của bất động sản
        return view('client.property.show', compact('property', 'propertyimages'));
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

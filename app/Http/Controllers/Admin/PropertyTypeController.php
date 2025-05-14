<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    public function index()
    {
        // Hiển thị danh sách danh mục
        $categories = PropertyType::paginate(10);
        return view('admin.property_types.index', compact('categories'));
    }

    public function create()
    {
        // Hiển thị form tạo danh mục mới
        $category = new PropertyType();
        return view('admin.property_types.create', compact('category'));
    }

    public function store(Request $request)
    {
        // Xử lý lưu danh mục mới
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
        ]);

        PropertyType::create($request->all());

        return redirect()->route('admin.property_types.index')->with('success', 'Tạo danh mục thành công!');
    }

    public function edit($id)
    {
        // Hiển thị form chỉnh sửa danh mục
        $category = PropertyType::findOrFail($id);
        return view('admin.property_types.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        // Xử lý cập nhật danh mục
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
        ]);

        $category = PropertyType::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('admin.property_types.index')->with('success', 'Cập nhật danh mục thành công!');
    }

    public function destroy($id)
    {
        // Xử lý xóa danh mục
        $category = PropertyType::findOrFail($id)->delete();

        return redirect()->route('admin.property_types.index')->with('success', 'Xóa danh mục thành công!');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    public function index()
    {
        // Hiển thị danh sách bất động sản
        $property = Property::paginate(10);
        return view('admin.property.index', compact('property'));
    }

    public function create()
    {
        $property = new Property();
        $propertyTypes = PropertyType::all();
        $locations = Location::all();
        return view('admin.property.create', compact('property', 'propertyTypes', 'locations'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:properties,slug',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'area' => 'required|numeric',
            'address' => 'nullable|string',
            'property_type_id' => 'required|exists:property_types,id',
            'location_id' => 'required|exists:locations,id',
            'status' => 'required|in:available,sold,rented',
            'view_count' => 'nullable|numeric',
        ]);

        $data = $request->all();
        $data['slug'] = $data['slug'] ?: \Str::slug($data['title']);
        $data['user_id'] = Auth::id(); // 👈 Gán người đăng nhập

        Property::create($data);

        return redirect()->route('admin.property.index')->with('success', 'Thêm bất động sản thành công!');
    }

    public function edit($id)
    {
        $property = Property::findOrFail($id);
        $propertyTypes = PropertyType::all();
        $locations = Location::all();
        return view('admin.property.edit', compact('property', 'propertyTypes', 'locations'));
    }

    public function update(Request $request, $id)
    {
        // Validate các trường dữ liệu từ bảng properties (loại bỏ user_id vì sẽ tự set)
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'area' => 'required|numeric',
            'address' => 'nullable|string|max:255',
            'property_type_id' => 'required|exists:property_types,id',
            'location_id' => 'required|exists:locations,id',
            'status' => 'nullable|string|max:50',
            'view_count' => 'nullable|integer',
        ]);

        // Thêm user_id từ người dùng hiện tại
        $data['user_id'] = Auth::id();

        // Cập nhật bất động sản
        $property = Property::findOrFail($id);
        $property->update($data);

        return redirect()->route('admin.property.index')->with('success', 'Cập nhật bất động sản thành công!');
    }
    public function destroy($id)
    {
        $property = Property::findOrFail($id)->delete();
        return redirect()->route('admin.property.index')->with('success', 'Xóa bất động sản thành công!');
    }
    public function show($id)
    {
        // Hiển thị chi tiết bất động sản
        $property = Property::findOrFail($id);
        return view('admin.property.show', compact('property'));
    }
}

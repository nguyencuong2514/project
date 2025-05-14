<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;
use PgSql\Lob;

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
        // Validate các trường dữ liệu từ bảng properties
        $request->validate([
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
            'category_id' => 'required|exists:categories,id',
        ]);
        // Đảm bảo trường slug luôn có giá trị (nếu không nhập thì tự tạo từ title)
        $data = $request->all();
        if (empty($data['slug'])) {
            $data['slug'] = \Illuminate\Support\Str::slug($data['title']);
        }
        // Gán user_id là id của user đang đăng nhập
        $data['user_id'] = auth()->user()->id;
        // Xử lý ảnh chính
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('/images/properties');
            $image->move($path, $filename);
            $data['image'] = '/images/properties/' . $filename;
        }
        $property = Property::create($data);
        return redirect()->route('admin.property.index', compact('property'))->with('success', 'Tạo bất động sản thành công!');
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
        // Validate các trường dữ liệu từ bảng properties
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'area' => 'required|numeric',
            'address' => 'nullable|string|max:255',
            'user_id' => 'required|exists:users,id',
            'property_type_id' => 'required|exists:property_types,id',
            'location_id' => 'required|exists:locations,id',
            'status' => 'nullable|string|max:50',
            'view_count' => 'nullable|integer',
        ]);
        $property = Property::findOrFail($id);
        $property->update($request->all());
        // ...xử lý ảnh nếu có...
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

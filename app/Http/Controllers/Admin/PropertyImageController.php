<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyImage;
use Illuminate\Http\Request;

class PropertyImageController extends Controller
{
    public function index(Request $request)
    {
        // Hiển thị danh sách hình ảnh bất động sản
        $propertyImages = PropertyImage::paginate(10);
        return view('admin.property_image.index', compact('propertyImages'));
    }
    public function create()
    {
        $propertyImage = new PropertyImage();
        $properties = Property::all(); // Để hiển thị dropdown chọn bất động sản
        return view('admin.property_image.create', compact('propertyImage', 'properties'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image_path' => 'required|image|max:2048',
            'property_id' => 'required|exists:properties,id',
        ]);

        $propertyImage = new PropertyImage();

        // Lưu file ảnh vào thư mục storage/app/public/property_images
        $storedPath = $request->file('image_path')->store('property_images', 'public');

        // Gán đường dẫn vào cột `image_path` thay vì `path`
        $propertyImage->image_path = $storedPath;
        $propertyImage->property_id = $request->input('property_id');
        $propertyImage->save();

        return redirect()->route('admin.property_image.index')->with('success', 'Tạo hình ảnh bất động sản thành công!');
    }

    public function edit($id)
    {
        $properties = Property::all(); // Để hiển thị dropdown chọn bất động sản
        $propertyImage = PropertyImage::findOrFail($id);
        return view('admin.property_image.edit', compact('propertyImage', 'properties'));
    }
    public function update(Request $request, $id)
    {
        // Xử lý cập nhật hình ảnh bất động sản
        $request->validate([
            'image_path' => 'nullable|image|max:2048',
            'property_id' => 'required|exists:properties,id',
        ]);

        $propertyImage = PropertyImage::findOrFail($id);
        if ($request->hasFile('image_path')) {
            $propertyImage->path = $request->file('image_path')->store('property_images', 'public');
        }
        $propertyImage->property_id = $request->input('property_id');
        $propertyImage->save();
        return redirect()->route('admin.property_image.index')->with('success', 'Cập nhật hình ảnh bất động sản thành công!');
    }
    public function destroy($id)
    {
        // Xóa hình ảnh bất động sản
        $propertyImage = PropertyImage::findOrFail($id);
        $propertyImage->delete();
        return redirect()->route('admin.property_image.index')->with('success', 'Xóa hình ảnh bất động sản thành công!');
    }
}

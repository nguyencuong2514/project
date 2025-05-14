<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        // Hiển thị danh sách địa điểm
        $locations = Location::paginate(10);
        return view('admin.location.index', compact('locations'));
    }
    public function create()
    {
        // Hiển thị form tạo địa điểm mới
        $location = new Location();
        return view('admin.location.create', compact('location'));
    }
    public function store(Request $request)
    {
        // Xử lý lưu địa điểm mới với các trường: province, district, ward, street
        $data = $request->validate([
            'province' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'ward'     => 'required|string|max:255',
            'street'   => 'required|string|max:255',
        ]);

        // Đảm bảo model Location có $fillable cho các trường này
        $location = new Location();
        $location->province = $data['province'];
        $location->district = $data['district'];
        $location->ward = $data['ward'];
        $location->street = $data['street'];
        $location->save();

        return redirect()->route('admin.location.index')->with('success', 'Tạo địa điểm thành công!');
    }
    public function edit($id)
    {
        // Hiển thị form chỉnh sửa địa điểm
        $location = Location::findOrFail($id);
        return view('admin.location.edit', compact('location'));
    }
    public function update(Request $request, $id)
    {
        // Xử lý cập nhật địa điểm với các trường: province, district, ward, street
        $data = $request->validate([
            'province' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'ward'     => 'required|string|max:255',
            'street'   => 'required|string|max:255',
        ]);

        $location = Location::findOrFail($id);
        $location->province = $data['province'];
        $location->district = $data['district'];
        $location->ward = $data['ward'];
        $location->street = $data['street'];
        $location->save();

        return redirect()->route('admin.location.index')->with('success', 'Cập nhật địa điểm thành công!');
    }
    public function destroy($id)
    {
        // Xử lý xóa địa điểm
        $location = Location::findOrFail($id);
        $location->delete();

        return redirect()->route('admin.location.index')->with('success', 'Xóa địa điểm thành công!');
    }
    public function show($id)
    {
        // Hiển thị chi tiết địa điểm
        $location = Location::findOrFail($id);
        return view('admin.location.show', compact('location'));
    }
}

@extends('layout.admin')
@section('title', 'Danh sách ảnh bất động sản')
@section('content')
<div class="container py-4">
    <h1 class="h3 mb-4 text-center">Danh sách ảnh bất động sản</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <a href="{{ route('admin.property_image.create') }}" class="btn btn-primary mb-3">Thêm ảnh mới</a>
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>ID</th>
                                <th>Bất động sản</th>
                                <th>Ảnh</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($propertyImages as $image)
                                <tr>
                                    <td>{{ $image->id }}</td>
                                    <td>{{ $image->property ? $image->property->title : 'Không xác định' }}</td>
                                    <td>
                                        <img src="{{ Storage::url($image->image_path) }}" alt="Ảnh" style="width: 120px; height: auto;">
                                    </td>
                                    <td>{{ $image->created_at }}</td>
                                    <td>{{ $image->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.property_image.edit', $image->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                        <form action="{{ route('admin.property_image.destroy', $image->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa ảnh này không?')">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $propertyImages->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

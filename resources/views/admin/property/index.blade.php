@extends('layout.admin')
@section('title', 'Danh sách bất động sản')
@section('content')
<div class="container py-4">
    <h1 class="h3 mb-4 text-center">Danh sách bất động sản</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <a href="{{ route('admin.property.create') }}" class="btn btn-primary mb-3">Thêm bất động sản</a>

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
                                <th>Tiêu đề</th>
                                <th>Slug</th>
                                <th>Mô tả</th>
                                <th>Giá</th>
                                <th>Diện tích</th>
                                <th>Địa chỉ</th>
                                <th>Loại</th>
                                <th>Vị trí</th>
                                <th>Người đăng</th>
                                <th>Trạng thái</th>
                                <th>Lượt xem</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($property as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->slug }}</td>
                                    <td>{{ Str::limit($item->description, 50) }}</td>
                                    <td>{{ number_format($item->price, 0, ',', '.') }} đ</td>
                                    <td>{{ $item->area }} m²</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->propertyType->name ?? '' }}</td>
                                    <td>{{ $item->location->name ?? '' }}</td>
                                    <td>{{ $item->user->name ?? '' }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->view_count }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.property.show', $item->id) }}" class="btn btn-info btn-sm">Xem</a>
                                        <a href="{{ route('admin.property.edit', $item->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                        <form action="{{ route('admin.property.destroy', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa bất động sản này không?')">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $property->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

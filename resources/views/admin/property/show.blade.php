@extends('layout.admin')
@section('title', 'Chi tiết bất động sản')
@section('content-header')

@section('content')
   <h1>Chi tiết bất động sản</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('admin.property.index') }}">Bất động sản</a></li>
        <li class="breadcrumb-item active">Chi tiết</li>
    </ol>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Thông tin chi tiết</h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $property->id }}</td>
                </tr>
                <tr>
                    <th>Tiêu đề</th>
                    <td>{{ $property->title }}</td>
                </tr>
                <tr>
                    <th>Slug</th>
                    <td>{{ $property->slug }}</td>
                </tr>
                <tr>
                    <th>Mô tả</th>
                    <td>{{ $property->description }}</td>
                </tr>
                <tr>
                    <th>Giá</th>
                    <td>{{ number_format($property->price, 0, ',', '.') }} đ</td>
                </tr>
                <tr>
                    <th>Diện tích</th>
                    <td>{{ $property->area }} m²</td>
                </tr>
                <tr>
                    <th>Địa chỉ</th>
                    <td>{{ $property->address }}</td>
                </tr>
                <tr>
                    <th>Loại bất động sản</th>
                    <td>{{ $property->propertyType->name ?? 'Không xác định' }}</td>
                </tr>
                <tr>
                    <th>Vị trí</th>
                    <td>
                        {{-- Kiểm tra kỹ thuộc tính location --}}
                        @if($property->location)
                            {{ $property->location->province ?? $property->location->name ?? $property->location->title }}
                        @else
                            Không xác định
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Người đăng</th>
                    <td>{{ $property->user->name ?? 'Không xác định' }}</td>
                </tr>
                <tr>
                    <th>Trạng thái</th>
                    <td>{{ $property->status }}</td>
                </tr>
                <tr>
                    <th>Lượt xem</th>
                    <td>{{ $property->view_count }}</td>
                </tr>
                <tr>
                    <th>Ngày tạo</th>
                    <td>{{ $property->created_at }}</td>
                </tr>
                <tr>
                    <th>Ngày cập nhật</th>
                    <td>{{ $property->updated_at }}</td>
                </tr>
            </table>
        </div>
    </div>
@endsection

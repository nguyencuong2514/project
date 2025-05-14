@extends('layout.admin')
@section('title', 'Chi tiết địa điểm')
@section('content')
<div class="container py-4">
    <h1 class="h3 mb-4 text-center">Chi tiết địa điểm</h1>
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $location->id }}</td>
                </tr>
                <tr>
                    <th>Thành phố</th>
                    <td>{{ $location->province }}</td>
                </tr>
                <tr>
                    <th>Quận/Huyện</th>
                    <td>{{ $location->district }}</td>
                </tr>
                <tr>
                    <th>Xã/Phường</th>
                    <td>{{ $location->ward }}</td>
                </tr>
                <tr>
                    <th>Đường/Phố</th>
                    <td>{{ $location->street }}</td>
                </tr>
                <tr>
                    <th>Ngày tạo</th>
                    <td>{{ $location->created_at }}</td>
                </tr>
                <tr>
                    <th>Ngày cập nhật</th>
                    <td>{{ $location->updated_at }}</td>
                </tr>
            </table>
            <a href="{{ route('admin.location.index') }}" class="btn btn-secondary mt-3">Quay lại danh sách</a>
        </div>
    </div>
</div>
@endsection

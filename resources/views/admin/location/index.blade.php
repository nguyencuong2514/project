@extends('layout.admin')
@section('title', 'Danh sách bất động sản')
@section('content')
<div class="container py-4">
    <h1 class="h3 mb-4 text-center">Danh sách bất động sản</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <a href="{{ route('admin.location.create') }}" class="btn btn-primary mb-3">Thêm địa điểm</a>

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
                                <th>Thành Phố</th>
                                <th>Quận/Huyện</th> {{-- Chỉ hiển thị thông tin từ bảng locations --}}
                                <th>Xã/Phường</th>
                                <th>Đường/Phố</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($locations as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->province }}</td>
                                    <td>{{ $item->district }}</td>
                                    <td>{{ $item->ward }}</td>
                                    <td>{{ $item->street }}</td>
                                    <td>
                                        <a href="{{ route('admin.location.show', $item->id) }}" class="btn btn-info btn-sm">Xem</a>
                                        <a href="{{ route('admin.location.edit', $item->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                        <form action="{{ route('admin.location.destroy', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $locations->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

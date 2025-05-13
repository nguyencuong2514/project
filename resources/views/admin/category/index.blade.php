@extends('layout.admin')
@section('title', 'Quản lý danh mục')

<style>
    .table th, .table td {
        vertical-align: middle !important;
        text-align: center;
    }
    .btn-sm {
        margin-right: 2px;
        min-width: 48px;
    }
    .btn-info, .btn-warning, .btn-danger {
        color: #fff;
    }
    .btn-info { background: #17a2b8; border: none; }
    .btn-warning { background: #ffc107; border: none; }
    .btn-danger { background: #dc3545; border: none; }
    .btn-info:hover, .btn-warning:hover, .btn-danger:hover {
        opacity: 0.85;
    }
</style>

@section('content')
<div class="container py-4">
    <h1 class="h3 mb-4 text-center">Quản lý danh mục</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary mb-3">Thêm danh mục</a>

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
                                <th>Tên danh mục</th>
                                <th>Mô tả</th>
                                <th>Ngày tạo</th>
                                <th>Ngày cập nhật</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ Str::limit($category->slug, 50) }}</td>
                                    <td>{{ $category->created_at }}</td>
                                    <td>{{ $category->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.category.show', $category->id) }}" class="btn btn-info btn-sm">Xem</a>
                                        <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                        <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            {{-- @method('DELETE') --}}
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này không?')">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

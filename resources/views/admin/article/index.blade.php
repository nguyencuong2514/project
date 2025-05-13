@extends('layout.admin')
@section('title', 'Quản lý bài viết')
@section('content')
    <div class="container py-4">
        <h1 class="h3 mb-4 text-center">Quản lý bài viết</h1>
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <a href="{{ route('admin.article.create') }}" class="btn btn-primary mb-3">Thêm bài viết</a>

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
                                    <th>User ID</th>
                                    <th>Tiêu đề</th>
                                    <th>Nội dung</th>
                                    <th>Địa chỉ</th>
                                    <th>Giá</th>
                                    <th>Diện tích</th>
                                    <th>Hình ảnh</th>
                                    <th>Ngày tạo</th>
                                    <th>Ngày cập nhật</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles as $article)
                                    <tr>
                                        <td>{{ $article->id }}</td>
                                        <td>{{ $article->user_id }}</td>
                                        <td>{{ $article->title }}</td>
                                        <td>{{ Str::limit($article->content, 50) }}</td>
                                        <td>{{ $article->address }}</td>
                                        <td>{{ number_format($article->price, 0, ',', '.') }} đ</td>
                                        <td>{{ $article->area }} m²</td>
                                        <td>
                                            @if ($article->image)
                                                <img src="{{ Storage::url($article->image) }}" width="80" height="60" style="object-fit: cover;" alt="image">
                                            @else
                                                <span class="text-muted">Không có</span>
                                            @endif
                                        </td>
                                        <td>{{ $article->created_at }}</td>
                                        <td>{{ $article->updated_at }}</td>
                                        <td>
                                            <a href="{{ route('admin.article.show', $article->id) }}" class="btn btn-info btn-sm">Xem</a>
                                            <a href="{{ route('admin.article.edit', $article->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                                            <form action="{{ route('admin.article.delete', $article->id) }}" method="GET" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này không?')">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $articles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

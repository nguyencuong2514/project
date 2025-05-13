@extends('layout.admin')
@section('title', 'Chi tiết bài viết')
@section('content')
    <div class="container py-4">
        <h1 class="h3 mb-4 text-center">Chi tiết bài viết</h1>

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif

                        <div class="row">
                            <div class="col-md-8">
                                <h3 class="mb-3">{{ $article->title }}</h3>

                                <p><strong>Nội dung:</strong><br>{{ $article->content }}</p>
                                <p><strong>Địa chỉ:</strong> {{ $article->address }}</p>
                                <p><strong>Giá:</strong> {{ number_format($article->price, 0, ',', '.') }} đ</p>
                                <p><strong>Diện tích:</strong> {{ $article->area }} m²</p>
                                <p><strong>Ngày tạo:</strong> {{ $article->created_at->format('d/m/Y H:i') }}</p>
                                <p><strong>Ngày cập nhật:</strong> {{ $article->updated_at->format('d/m/Y H:i') }}</p>
                            </div>

                            <div class="col-md-4 text-center">
                                <strong>Hình ảnh:</strong><br>
                                @if ($article->image)
                                    <img src="{{ Storage::url($article->image) }}" class="img-fluid rounded" alt="image">
                                @else
                                    <p class="text-muted mt-2">Không có hình ảnh</p>
                                @endif
                            </div>
                        </div>

                        <div class="mt-4 d-flex justify-content-between">
                            <a href="{{ route('admin.article.index') }}" class="btn btn-secondary">← Quay lại</a>
                            <div>
                                <a href="{{ route('admin.article.edit', $article->id) }}" class="btn btn-warning">Sửa</a>
                                <form action="{{ route('admin.article.delete', $article->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này không?')">Xóa</button>
                                </form>
                            </div>
                        </div>
                    </div> <!-- /.card-body -->
                </div> <!-- /.card -->
            </div>
        </div>
    </div>
@endsection

@extends('layout.layouts')
@section('title', 'Danh sách bài viết')
@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Danh sách bài viết</h1>

    @if (session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger text-center">{{ session('error') }}</div>
    @endif

    <div class="row">
        @forelse ($articles as $article)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if ($article->image)
                        <img src="{{ Storage::url($article->image) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="Ảnh bài viết">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center" style="height: 200px;">
                            <span class="text-muted">Không có ảnh</span>
                        </div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $article->title }}</h5>
                        <p class="card-text"><strong>Địa chỉ:</strong> {{ $article->address }}</p>
                        <p class="card-text text-truncate"><strong>Nội dung:</strong> {{ $article->content }}</p>
                        <p class="card-text"><strong>Giá:</strong> {{ number_format($article->price, 0, ',', '.') }} đ</p>
                        <p class="card-text"><strong>Diện tích:</strong> {{ $article->area }} m²</p>
                        <a href="{{ route('client.article.show', $article->id) }}" class="btn btn-primary mt-auto">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info text-center">Chưa có bài viết nào.</div>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $articles->links() }}
    </div>
</div>
@endsection

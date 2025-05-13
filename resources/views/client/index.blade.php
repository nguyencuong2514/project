@extends('layout.layouts')
@section('title', 'Trang chủ')
@section('content')
<div class="container py-4">
    <!-- Header Section -->
    <h1 class="display-5 fw-bold text-center text-dark mb-4">Chào mừng đến với Batdongsan.com.vn</h1>
    <p class="lead text-center text-secondary mb-5">Nơi kết nối mua bán bất động sản uy tín và chất lượng</p>

    <!-- Articles Section -->
    <div class="row g-4">
        @foreach($article as $a)
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    <img src="{{ Storage::url($a->image) }}" alt="Article Image" class="card-img-top" style="height: 220px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h2 class="card-title h5 text-dark">{{ $a->title }}</h2>
                        <p class="card-text text-secondary mt-2">{{ \Str::limit($a->content, 100) }}</p>
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <span class="text-muted small">{{ $a->created_at->format('d/m/Y') }}</span>
                            <a href="{{ route('client.article.show', $a->id) }}" class="text-danger text-decoration-none fw-semibold">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Pagination Section -->
    <div class="mt-5 d-flex justify-content-center">
        {{ $article->links() }}
    </div>
</div>
@endsection

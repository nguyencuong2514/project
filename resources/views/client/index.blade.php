@extends('layout.layouts')
@section('title', 'Trang chủ')

@section('content')
<div class="container py-4">
    <h1 class="display-5 fw-bold text-center text-dark mb-4">Chào mừng đến với Batdongsan.com.vn</h1>
    <p class="lead text-center text-secondary mb-5">Nơi kết nối mua bán bất động sản uy tín và chất lượng</p>

    {{-- 'text-center' on heading for "Bài viết nổi bật" --}}
    <h3 class="mb-4 text-primary text-center">Bài viết nổi bật</h3>
       <div class="col-lg-8">
            @if($article->count()) {{-- Checks if there are any articles to display --}}
            <div id="articleCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                <div class="carousel-inner rounded shadow">
                    {{-- Loop through the first 5 articles to create carousel items --}}
                    @foreach($article->take(5) as $key => $a)
                    <div class="carousel-item @if($key == 0) active @endif"> {{-- 'active' class for the first item --}}
                        {{-- Article image --}}
                        <img src="{{ Storage::url($a->image) }}" class="d-block w-100" style="height: 360px; object-fit: cover;" alt="{{ $a->title }}">
                        {{-- Carousel caption with article title, snippet, and "Xem thêm" button --}}
                        <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 p-3 rounded">
                            <h5 class="text-white">{{ $a->title }}</h5>
                            <p class="text-light mb-2">{{ \Str::limit(strip_tags($a->content), 100) }}</p>
                            <a href="{{ route('client.article.show', $a->id) }}" class="btn btn-sm btn-light">Xem thêm</a>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{-- Previous button for the carousel --}}
                <button class="carousel-control-prev" type="button" data-bs-target="#articleCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                {{-- Next button for the carousel --}}
                <button class="carousel-control-next" type="button" data-bs-target="#articleCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            @endif
        </div>

    {{-- 'text-center' on heading for "Danh sách bất động sản" --}}
    <h3 class="mb-3 text-success text-center">Danh sách bất động sản</h3>
    <div class="row g-4 mb-5">
        @foreach($property as $p)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                    @foreach($propertyimages as $index => $image)
                        @if($p->id == $image->property_id)
                            <img src="{{ Storage::url($image->image_path) }}" class="d-block w-100" alt="Ảnh bất động sản" style="height: 200px; object-fit: cover;">
                        @endif
                    @endforeach
                <div class="card-body d-flex flex-column">
                    <h2 class="card-title h5 text-dark">{{ $p->title }}</h2>
                    <p class="card-text text-secondary mt-2">{{ \Str::limit($p->description, 100) }}</p>
                    <div class="mt-auto d-flex justify-content-between align-items-center">
                        <a href="{{ route('client.property.show', $p->id) }}" class="text-primary text-decoration-none fw-semibold">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-5 d-flex justify-content-center">
        {{ $article->links() }}
    </div>
</div>
@endsection

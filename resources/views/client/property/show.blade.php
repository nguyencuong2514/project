@extends('layout.layouts')

@section('title', $property->title)

@section('content')
<div class="container py-5">
    <!-- Tiêu đề -->
    <h2 class="fw-bold mb-4">{{ $property->title }}</h2>

    <div class="row">
        <!-- Hình ảnh & mô tả -->
        <div class="col-lg-8">
            <!-- Carousel -->
            <div id="propertyCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($propertyimages as $image)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <img src="{{ Storage::url($image->image_path) }}" class="d-block w-100" alt="Ảnh">
                        </div>
                    @endforeach
                </div>
                @if($propertyimages->count() > 1)
                    <button class="carousel-control-prev" type="button" data-bs-target="#propertyCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#propertyCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                @endif
            </div>

            <!-- Mô tả -->
            <div class="mb-4">
                <h5 class="text-primary">Thông tin mô tả</h5>
                <p>{{ $property->description }}</p>
            </div>

            <!-- Bảng thông tin bất động sản -->
            <div class="table-responsive mb-4">
                <table class="table table-bordered">
                    <tr>
                        <th>Giá</th>
                        <td>{{ number_format($property->price, 0, ',', '.') }} VNĐ</td>
                        <th>Diện tích</th>
                        <td>{{ $property->area }} m²</td>
                    </tr>
                    <tr>
                        <th>Địa chỉ</th>
                        <td colspan="3">{{ $property->address }}</td>
                    </tr>
                    <tr>
                        <th>Ngày đăng</th>
                        <td>{{ $property->created_at}}</td>

                    </tr>

                </table>
            </div>
        </div>

        <!-- Thông tin người đăng -->
        <div class="col-lg-4">
            <div class="card p-3 mb-4">
                <div class="d-flex align-items-center">
                    <img src="{{ $property->user->avatar ? Storage::url($property->user->avatar) : 'https://via.placeholder.com/50' }}"
                         class="rounded-circle me-3" width="50" height="50" alt="Avatar">
                    <div>
                        <h6 class="mb-0">{{ $property->user->name }}</h6>
                        <small class="text-muted">Đăng tin: {{ $property->created_at}}</small>
                        <p class="mt-2 mb-0">
                            <strong>Điện thoại:</strong>
                            {{ substr($property->user->phone, 0, 7) . '***' }}
                        </p>
                        <a href="https://zalo.me/{{ $property->user->zalo }}" class="btn btn-outline-primary btn-sm mt-2">Chat Zalo</a>
                    </div>
                </div>
            </div>

            <!-- Gợi ý: Thêm biểu đồ lượt xem hoặc bảng thống kê -->
            {{-- <div class="card p-3">
                <h6>Lượt xem bài đăng</h6>
                <canvas id="viewsChart"></canvas>
            </div> --}}
        </div>
    </div>
</div>
@endsection

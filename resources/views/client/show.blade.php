@extends('layout.layouts')

@section('title', 'Chi tiết BĐS')

@section('content')
<div class="row">
    <!-- Nội dung chính -->
    <div class="col-md-8">
        <!-- Tiêu đề -->
        <h1 class="h4 fw-bold mb-3">{{ $client->title }}</h1>

        <!-- Ảnh đại diện -->
        <img src="{{ Storage::url($client->image) }}" alt="Hình ảnh BĐS" class="img-fluid rounded mb-4">

        <!-- Thông tin cơ bản -->
        <div class="mb-3">
            <span class="badge bg-danger me-2">Giá: {{ $client->price }} tỷ</span>
            <span class="badge bg-secondary me-2">Diện tích: {{ $client->area }} m²</span>
            <span class="badge bg-success">Mặt tiền: {{ $client->front }} m</span>
        </div>

        <!-- Địa chỉ -->
        <p><strong>Địa chỉ:</strong> {{ $client->address }}</p>

        <!-- Mô tả chi tiết -->
        <div class="mt-4">
            <h5 class="fw-semibold">Mô tả chi tiết</h5>
            <p>{{ $client->description }}</p>
        </div>

        <!-- Lượt xem, ngày đăng -->
        <p class="text-muted small mt-4">👁️ {{ $client->views }} lượt xem • Đăng ngày: {{ $client->created_at->format('d/m/Y') }}</p>
    </div>

    <!-- Sidebar thông tin người đăng -->
    <div class="col-md-4">
        <div class="border rounded p-3 bg-white shadow-sm">
            <h6 class="fw-bold mb-3">Thông tin liên hệ</h6>
            <p class="mb-1"><strong>Người đăng:</strong> {{ $client->user->name }}</p>
            <p class="mb-1"><strong>SĐT:</strong> {{ $client->user->phone }}</p>
            <p class="mb-1"><strong>Email:</strong> {{ $client->user->email }}</p>
            <a href="tel:{{ $client->user->phone }}" class="btn btn-danger w-100 mt-3">Gọi ngay</a>
        </div>
    </div>
</div>
@endsection

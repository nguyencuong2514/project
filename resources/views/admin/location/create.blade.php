@extends('layout.admin')
@section('title', 'Thêm địa điểm')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h1 class="h4 mb-0">Thêm địa điểm</h1>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('admin.location.create') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="province" class="form-label">Thành phố</label>
                            <input type="text" class="form-control" id="province" name="province" required>
                        </div>
                        <div class="mb-3">
                            <label for="district" class="form-label">Quận/Huyện</label>
                            <input type="text" class="form-control" id="district" name="district" required>
                        </div>
                        <div class="mb-3">
                            <label for="ward" class="form-label">Xã/Phường</label>
                            <input type="text" class="form-control" id="ward" name="ward" required>
                        </div>
                        <div class="mb-3">
                            <label for="street" class="form-label">Đường/Phố</label>
                            <input type="text" class="form-control" id="street" name="street" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Thêm địa điểm</button>
                        <a href="{{ route('admin.location.index') }}" class="btn btn-secondary w-100 mt-2">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

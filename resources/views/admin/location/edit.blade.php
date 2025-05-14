@extends('layout.admin')
@section('title', 'Chỉnh sửa địa điểm')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-warning text-white text-center py-3">
                    <h1 class="h4 mb-0">Chỉnh sửa địa điểm</h1>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('admin.location.update', $location->id) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="province" class="form-label">Thành phố</label>
                            <input type="text" class="form-control" id="province" name="province" value="{{ old('province', $location->province) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="district" class="form-label">Quận/Huyện</label>
                            <input type="text" class="form-control" id="district" name="district" value="{{ old('district', $location->district) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="ward" class="form-label">Xã/Phường</label>
                            <input type="text" class="form-control" id="ward" name="ward" value="{{ old('ward', $location->ward) }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="street" class="form-label">Đường/Phố</label>
                            <input type="text" class="form-control" id="street" name="street" value="{{ old('street', $location->street) }}" required>
                        </div>
                        <button type="submit" class="btn btn-warning w-100">Lưu thay đổi</button>
                        <a href="{{ route('admin.location.index') }}" class="btn btn-secondary w-100 mt-2">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

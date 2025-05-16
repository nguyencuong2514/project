@extends('layout.admin')
@section('title', 'Thêm ảnh bất động sản')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h1 class="h4 mb-0">Thêm ảnh bất động sản</h1>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('admin.property_image.create') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="property_id" class="form-label">Bất động sản</label>
                            <select class="form-select" id="property_id" name="property_id" required>
                                <option value="">-- Chọn bất động sản --</option>
                                @foreach($properties as $property)
                                    <option value="{{ $property->id }}" {{ old('property_id') == $property->id ? 'selected' : '' }}>
                                        {{ $property->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="image_path" class="form-label">Chọn ảnh</label>
                            <input type="file" class="form-control" id="image_path" name="image_path" >
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Thêm ảnh</button>
                        <a href="{{ route('admin.property_image.index') }}" class="btn btn-secondary w-100 mt-2">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

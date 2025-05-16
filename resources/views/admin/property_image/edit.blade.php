@extends('layout.admin')
@section('title', 'Chỉnh sửa ảnh bất động sản')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-warning text-white text-center py-3">
                    <h1 class="h4 mb-0">Chỉnh sửa ảnh bất động sản</h1>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('admin.property_image.edit', $propertyImage->id) }}" enctype="multipart/form-data">
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="mb-3">
                            <label for="property_id" class="form-label">Bất động sản</label>
                            <select class="form-select" id="property_id" name="property_id" required>
                                <option value="">-- Chọn bất động sản --</option>
                                @foreach($properties as $property)
                                    <option value="{{ $property->id }}" {{ old('property_id', $propertyImage->property_id) == $property->id ? 'selected' : '' }}>
                                        {{ $property->title }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ảnh hiện tại</label><br>
                            <img src="{{ Storage::url($propertyImage->image_path) }}" alt="Ảnh hiện tại" style="width: 120px; height: auto;">
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Chọn ảnh mới (nếu muốn thay đổi)</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <button type="submit" class="btn btn-warning w-100">Lưu thay đổi</button>
                        <a href="{{ route('admin.property_image.index') }}" class="btn btn-secondary w-100 mt-2">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

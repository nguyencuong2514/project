@extends('layout.admin')
@section('title', 'Cập nhật bất động sản')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-warning text-white text-center py-3">
                    <h1 class="h4 mb-0">Cập nhật bất động sản</h1>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('admin.property.edit', $property->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="title" class="form-label">Tiêu đề</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $property->title) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" value="{{ old('slug', $property->slug) }}">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Mô tả</label>
                            <textarea class="form-control" id="description" name="description" rows="4">{{ old('description', $property->description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Giá</label>
                            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $property->price) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="area" class="form-label">Diện tích (m²)</label>
                            <input type="number" class="form-control" id="area" name="area" value="{{ old('area', $property->area) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{ old('address', $property->address) }}">
                        </div>

                        <div class="mb-3">
                            <label for="property_type_id" class="form-label">Loại bất động sản</label>
                            <select class="form-select" id="property_type_id" name="property_type_id" required>
                                <option value="">-- Chọn loại --</option>
                                @foreach($propertyTypes as $type)
                                    <option value="{{ $type->id }}" {{ old('property_type_id', $property->property_type_id) == $type->id ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="location_id" class="form-label">Vị trí</label>
                            <select class="form-select" id="location_id" name="location_id" required>
                                <option value="">-- Chọn vị trí --</option>
                                @foreach($locations as $loc)
                                    <option value="{{ $loc->id }}" {{ old('location_id', $property->location_id) == $loc->id ? 'selected' : '' }}>
                                        {{ $loc->province }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Trạng thái</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="">-- Trạng thái --</option>
                                <option value="available" {{ old('status', $property->status) == 'available' ? 'selected' : '' }}>Có sẵn</option>
                                <option value="sold" {{ old('status', $property->status) == 'sold' ? 'selected' : '' }}>Đã bán</option>
                                <option value="rented" {{ old('status', $property->status) == 'rented' ? 'selected' : '' }}>Thuê</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="view_count" class="form-label">Lượt xem</label>
                            <input type="number" class="form-control" id="view_count" name="view_count" value="{{ old('view_count', $property->view_count) }}">
                        </div>

                        <button type="submit" class="btn btn-warning w-100">Cập nhật</button>
                        <a href="{{ route('admin.property.index') }}" class="btn btn-secondary w-100 mt-2">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

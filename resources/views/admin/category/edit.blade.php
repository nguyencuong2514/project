@extends('layout.admin')
@section('title', 'Chỉnh sửa danh mục')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h1 class="h4 mb-0">Chỉnh sửa danh mục</h1>
                </div>
                <div class="card-body p-4">
                    <form method="POST" action="{{ route('admin.category.update', $category->id) }}">
                        @csrf
                        {{-- @method('PUT') --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Tên danh mục</label>
                            <input
                                type="text"
                                class="form-control"
                                id="name"
                                name="name"
                                value="{{ old('name', $category->name) }}"
                                required
                            >
                        </div>
                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input
                                type="text"
                                class="form-control"
                                id="slug"
                                name="slug"
                                value="{{ old('slug', $category->slug) }}"
                                required
                            >
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Lưu thay đổi</button>
                        <a href="{{ route('admin.category.index') }}" class="btn btn-secondary w-100 mt-2">Quay lại</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

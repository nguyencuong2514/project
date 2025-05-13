{{-- filepath: d:\laragon\www\project\resources\views\admin\article\edit.blade.php --}}
@extends('layout.admin')
@section('title', 'Chỉnh sửa bài viết')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center py-3">
                    <h1 class="h3 mb-0">Chỉnh sửa bài viết</h1>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('admin.article.update', $article->id) }}" enctype="multipart/form-data">
                        @csrf
                        {{-- @method('PUT') --}}

                        <div class="row g-3">
                            <div class="col-12">
                                <label for="title" class="form-label">Tiêu đề</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="title"
                                    name="title"
                                    placeholder="Nhập tiêu đề"
                                    value="{{ old('title', $article->title) }}"
                                    required
                                >
                            </div>

                            <div class="col-12">
                                <label for="content" class="form-label">Nội dung</label>
                                <textarea
                                    class="form-control"
                                    id="content"
                                    name="content"
                                    rows="5"
                                    placeholder="Nhập nội dung chi tiết"
                                    required
                                >{{ old('content', $article->content) }}</textarea>
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">Địa chỉ</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="address"
                                    name="address"
                                    placeholder="Nhập địa chỉ"
                                    value="{{ old('address', $article->address) }}"
                                    required
                                >
                            </div>

                            <div class="col-md-6">
                                <label for="price" class="form-label">Giá</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    id="price"
                                    name="price"
                                    placeholder="Nhập giá"
                                    value="{{ old('price', $article->price) }}"
                                    required
                                >
                            </div>

                            <div class="col-md-6">
                                <label for="area" class="form-label">Diện tích</label>
                                <input
                                    type="number"
                                    class="form-control"
                                    id="area"
                                    name="area"
                                    placeholder="Nhập diện tích"
                                    value="{{ old('area', $article->area) }}"
                                    required
                                >
                            </div>

                            <div class="col-12">
                                <label for="image" class="form-label">Ảnh đại diện</label>
                                <input
                                    type="file"
                                    class="form-control"
                                    id="image"
                                    name="image"
                                >
                                @if($article->image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $article->image) }}" alt="Ảnh hiện tại" style="max-width: 150px;">
                                    </div>
                                @endif
                            </div>

                            <div class="col-12">
                                <button
                                    type="submit"
                                    class="btn btn-primary w-100 py-2"
                                >
                                    LƯU THAY ĐỔI
                                </button>
                                <a href="{{ route('admin.article.index') }}" class="btn btn-secondary w-100 mt-2">Quay lại</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

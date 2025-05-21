
@extends('layout.layouts')

@section('title', 'Đăng tin')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-danger text-white text-center py-3">
                    <h1 class="h3 mb-0">ĐĂNG TIN</h1>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('client.article.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row g-3">
                            <div class="col-12">
                                <label for="title" class="form-label">Tiêu đề</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="title"
                                    name="title"
                                    placeholder="Nhập tiêu đề"
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
                                ></textarea>
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">Địa chỉ</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="address"
                                    name="address"
                                    placeholder="Nhập địa chỉ"
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
                            </div>

                            <div class="col-12">
                                <button
                                    type="submit"
                                    class="btn btn-danger w-100 py-2"
                                >
                                    ĐĂNG TIN
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


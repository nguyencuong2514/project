@extends('layout.admin')
@section('title', 'Thêm danh mục')
@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-danger text-white text-center py-3">
                    <h1 class="h3 mb-0">Thêm danh mục</h1>
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('admin.category.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Tên danh mục</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>

                        <div class="mb-3">
                            <label for="slug" class="form-label">Slug</label>
                            <input type="text" class="form-control" id="slug" name="slug" required>
                        </div>

                        <button type="submit" class="btn btn-danger w-100">Thêm danh mục</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

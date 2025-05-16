@extends('layout.admin')

@section('title', 'Chỉnh sửa vai trò người dùng')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Cập nhật vai trò người dùng</h2>

    <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
        @csrf
        {{-- @method('PUT') --}}

        {{-- Tên người dùng (readonly) --}}
        <div class="mb-3">
            <label for="name" class="form-label">Tên người dùng</label>
            <input type="text" class="form-control" id="name" value="{{ $user->name }}" readonly>
        </div>

        {{-- Email (readonly) --}}
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" value="{{ $user->email }}" readonly>
        </div>

        {{-- Vai trò --}}
        <div class="mb-3">
            <label for="role" class="form-label">Vai trò</label>
            <select name="role" id="role" class="form-select">
                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>Người dùng</option>
                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Quản trị</option>
                <option value="agent" {{ $user->role === 'agent' ? 'selected' : '' }}>Seller</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật vai trò</button>
    </form>
</div>
@endsection

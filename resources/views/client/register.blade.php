@extends('layout.layouts')
@section('title', 'Đăng ký tài khoản')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneO8ns5zJ5g3e3D/6fE3q2z9f3k+tL9V8cL5l9m8v9g==" crossorigin="anonymous">
<style>
    .form-container {
        background: #ffffff;
        padding: 2.5rem;
        border-radius: 1rem;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .form-container:hover {
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        transform: translateY(-5px);
    }

    .form-title {
        font-weight: 800;
        background: linear-gradient(to right, #0d6efd, #6610f2);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        text-align: center;
        margin-bottom: 2rem;
    }

    .input-field {
        border: 1px solid #ced4da;
        border-radius: 0.5rem;
        padding: 0.75rem 1rem;
        transition: all 0.3s ease;
        background: #f8f9fa;
    }

    .input-field:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 10px rgba(13, 110, 253, 0.2);
        background: #ffffff;
    }

    .submit-button {
        background: linear-gradient(to right, #0d6efd, #6610f2);
        border: none;
        padding: 0.75rem;
        border-radius: 0.5rem;
        font-weight: 600;
        color: white;
        transition: all 0.3s ease;
    }

    .submit-button:hover {
        background: linear-gradient(to right, #0b5ed7, #520dc2);
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(13, 110, 253, 0.4);
    }

    .submit-button:active {
        transform: scale(0.95);
    }

    .error-message {
        background: #f8d7da;
        border-left: 4px solid #dc3545;
        padding: 1rem;
        border-radius: 0.5rem;
        margin-bottom: 1.5rem;
    }

    @media (max-width: 576px) {
        .form-container {
            padding: 1.5rem;
        }

        .form-title {
            font-size: 1.5rem;
        }
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="form-title">Đăng ký tài khoản</h2>

            @if ($errors->any())
                <div class="error-message">
                    <ul class="list-unstyled mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register') }}" method="POST" class="form-container">
                @csrf

                <div class="mb-4">
                    <label class="form-label fw-semibold">Họ và tên</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                           class="form-control input-field" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                           class="form-control input-field" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Mật khẩu</label>
                    <input type="password" name="password"
                           class="form-control input-field" required>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold">Nhập lại mật khẩu</label>
                    <input type="password" name="password_confirmation"
                           class="form-control input-field" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn submit-button w-100">
                        Đăng ký
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
@endsection

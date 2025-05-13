<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Bất động sản')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <!-- Header -->
    <header class="bg-white shadow-sm py-3 mb-4">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Logo -->
            <div class="d-flex align-items-center gap-2">

                <img src="{{ Storage::url('images/logo.png') }}" alt="Logo" height="32">
                <a href="{{ route('client.index') }}"><span class="text-danger fw-bold fs-5">Batdongsan.com.vn</span></a>
            </div>

            <!-- Navigation -->
            <nav class="d-none d-md-flex gap-4 fw-semibold text-secondary">
                <a href="#" class="text-decoration-none">Nhà đất bán</a>
                <a href="#" class="text-decoration-none">Nhà đất cho thuê</a>
                <a href="#" class="text-decoration-none">Dự án</a>
                <a href="{{ route('client.article.index') }}" class="text-decoration-none">Tin tức</a>
                <a href="#" class="text-decoration-none">Wiki BĐS</a>
            </nav>

            <!-- Icons -->
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-link btn-icon" title="Yêu thích">❤️</button>
                <button class="btn btn-link btn-icon" title="Thông báo">🔔</button>
                @auth
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="auth-link text-decoration-none ">Đăng xuất</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="auth-link text-decoration-none">Đăng nhập</a>
                    <a href="{{ route('register') }}" class="auth-link text-decoration-none">Đăng ký</a>
                @endauth
                <a href="{{ route('client.article.create') }}" class="btn btn-danger btn-sm">Đăng tin</a>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="py-4">
        <div class="container">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-light text-muted mt-5 border-top pt-5">
        <div class="container">
            <div class="row gy-4">
                <!-- Logo + Info -->
                <div class="col-md-3">
                    <div class="d-flex align-items-center gap-2 mb-2">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" height="24">
                        <span class="fw-bold text-dark">Batdongsan.com.vn</span>
                    </div>
                    <p class="mb-1">Công ty Cổ phần PropertyGuru Việt Nam</p>
                    <p class="mb-1">Tầng 31, Keangnam Hanoi Landmark Tower</p>
                    <p class="mb-0">Hotline: 1900 1881</p>
                </div>

                <!-- Menu -->
                <div class="col-md-3">
                    <h6 class="fw-semibold text-dark mb-2">Hướng dẫn</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none text-muted">Đăng tin</a></li>
                        <li><a href="#" class="text-decoration-none text-muted">Báo giá</a></li>
                        <li><a href="#" class="text-decoration-none text-muted">Giải đáp lỗi</a></li>
                    </ul>
                </div>

                <div class="col-md-3">
                    <h6 class="fw-semibold text-dark mb-2">Quy định</h6>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-decoration-none text-muted">Chính sách bảo mật</a></li>
                        <li><a href="#" class="text-decoration-none text-muted">Giải quyết khiếu nại</a></li>
                        <li><a href="#" class="text-decoration-none text-muted">Quy định đăng tin</a></li>
                    </ul>
                </div>

                <!-- Newsletter -->
                <div class="col-md-3">
                    <h6 class="fw-semibold text-dark mb-2">Đăng ký nhận tin</h6>
                    <form action="#" method="POST">
                        @csrf
                        <input type="email" name="email" placeholder="Nhập email..." class="form-control mb-2">
                        <button type="submit" class="btn btn-danger w-100">Gửi</button>
                    </form>
                </div>
            </div>

            <div class="text-center py-4 small text-secondary border-top mt-4">
                © 2007 - 2025 Batdongsan.com.vn. All rights reserved.
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS (Optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

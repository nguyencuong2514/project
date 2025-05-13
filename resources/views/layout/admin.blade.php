<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Trang Admin')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #343a40;
            color: white;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 15px;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .main-content {
            flex: 1;
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h4 class="text-center py-3 border-bottom">Admin Panel</h4>
        <a href="/admin">Dashboard</a>
        <a href="/admin/users">Quản lý người dùng</a>
        <a href="/admin/products">Quản lý sản phẩm</a>
        <a href="/admin/orders">Đơn hàng</a>
        <a href="/logout">Đăng xuất</a>
    </div>

    <div class="main-content">
        <h1 class="h4 mb-4">@yield('title')</h1>
        @yield('content')
    </div>
</body>
</html>

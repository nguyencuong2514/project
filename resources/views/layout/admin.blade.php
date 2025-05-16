<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Trang Quản Trị')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .wrapper {
            display: flex;
            flex: 1;
        }

        .sidebar {
            width: 250px;
            background: #343a40;
            color: #fff;
            min-height: 100vh;
            position: fixed;
        }

        .sidebar .nav-link {
            color: #fff;
            padding: 15px;
        }

        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background-color: #495057;
        }

        .content {
            margin-left: 250px;
            padding: 20px;
            flex: 1;
        }

        .navbar {
            z-index: 1000;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Trang quản trị</span>
            <div class="d-flex">
                <a href="/user" class="btn btn-outline-light btn-sm me-2">Trang người dùng</a>
                <a href="/logout" class="btn btn-outline-light btn-sm">Đăng xuất</a>
            </div>
        </div>
    </nav>

    <div class="wrapper">
        <div class="sidebar d-flex flex-column p-3">
            <h4 class="text-center">Admin Panel</h4>
            <hr>
            <a href="/admin" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">Dashboard</a>
            <a href="/admin/user" class="nav-link {{ request()->is('admin/user*') ? 'active' : '' }}">Quản lý người dùng</a>
            <a href="/admin/article" class="nav-link {{ request()->is('admin/article*') ? 'active' : '' }}">Quản lý bài viết</a>
            <a href="/admin/property_types" class="nav-link {{ request()->is('admin/property_types*') ? 'active' : '' }}">Quản lý loại bất động sản</a>
            <a href="/admin/property" class="nav-link {{ request()->is('admin/property*') ? 'active' : '' }}">Quản lý bất động sản</a>
            <a href="/admin/location" class="nav-link {{ request()->is('admin/location*') ? 'active' : '' }}">Quản lý vị trí</a>
            <a href="/admin/property_image" class="nav-link {{ request()->is('admin/property_images*') ? 'active' : '' }}">Quản lý hình ảnh bất động sản</a>


        </div>

        <div class="content">
            <h1 class="mb-4">@yield('title')</h1>
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

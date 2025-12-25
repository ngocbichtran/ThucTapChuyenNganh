<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','CapyKho Admin')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary: #137fec;
            --bg: #f6f7f8;
            --border: #e5e7eb;
            --text: #111418;
            --muted: #64748b;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            font-size: 14px;
            color: var(--text);
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 260px;
            background: #fff;
            border-right: 1px solid var(--border);
            min-height: 100vh;
            position: sticky;
            top: 0;
        }

        .brand {
            display: flex;
            gap: 12px;
            align-items: center;
            padding: 20px;
            border-bottom: 1px solid var(--border);
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            background: var(--primary);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            margin-bottom: 6px;
            border-radius: 10px;
            color: var(--text);
            text-decoration: none;
            font-weight: 500;
            transition: .25s;
        }

        .menu-link i {
            font-size: 18px;
        }

        .menu-link:hover {
            background: #eef2ff;
            color: var(--primary);
        }

        .menu-link.active {
            background: rgba(19,127,236,.12);
            color: var(--primary);
            font-weight: 600;
        }

        /* ===== MAIN ===== */
        .main {
            min-height: 100vh;
        }

        /* ===== TOPBAR ===== */
        .topbar {
            background: #fff;
            border-bottom: 1px solid var(--border);
            padding: 16px 24px;
            position: sticky;
            top: 0;
            z-index: 10;
        }

        /* ===== CONTENT ===== */
        .content {
            background: #fff;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 6px 20px rgba(0,0,0,.04);
        }
    </style>

    @stack('css')
</head>

<body>

<div class="d-flex">

    <!-- SIDEBAR -->
    <aside class="sidebar p-3">
        <div class="brand">
            <div class="brand-icon">
                <i class="bi bi-box-seam"></i>
            </div>
            <div>
                <strong>CapyKho</strong><br>
                <small class="text-muted">Quản lý kho</small>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('admin.dashboard') }}"
               class="menu-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i> Tổng quan
            </a>

            <a href="{{ route('admin.category.index') }}"
               class="menu-link {{ request()->routeIs('admin.category.*') ? 'active' : '' }}">
                <i class="bi bi-tags"></i> Danh mục
            </a>

            <a href="{{ route('admin.product.index') }}"
               class="menu-link {{ request()->routeIs('admin.product.*') ? 'active' : '' }}">
                <i class="bi bi-phone"></i> Sản phẩm
            </a>

            <hr>

            <a href="{{ route('admin.nhap.index') }}" class="menu-link">
                <i class="bi bi-download"></i> Nhập kho
            </a>

            <a href="{{ route('admin.xuat.index') }}" class="menu-link">
                <i class="bi bi-upload"></i> Xuất kho
            </a>

            <a href="{{ route('admin.tonkho.index') }}" class="menu-link">
                <i class="bi bi-archive"></i> Tồn kho
            </a>
        </div>
    </aside>

    <!-- MAIN -->
    <main class="flex-fill main">

        <!-- TOPBAR -->
        <div class="topbar d-flex justify-content-between align-items-center">
            <div class="fw-semibold">
                Xin chào, {{ auth()->user()->USER_NAME }}
            </div>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-danger btn-sm">
                    <i class="bi bi-box-arrow-right"></i> Đăng xuất
                </button>
            </form>
        </div>

        <!-- PAGE CONTENT -->
        <div class="p-4">
            <div class="content">
                @yield('body')
            </div>
        </div>

    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('js')
</body>
</html>

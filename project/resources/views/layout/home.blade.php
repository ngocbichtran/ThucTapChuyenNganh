<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','CapyKho Admin')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;900&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            /* Palette màu Midnight chuyên nghiệp - KHÔNG DÙNG MÀU TRẮNG */
            --primary: #3b82f6;            
            --bg: #0f172a;                 /* Nền ngoài cùng (Xanh đen) */
            --sidebar-bg: #1e293b;         /* Nền Sidebar */
            --topbar-bg: #1e293b;          /* Nền Topbar */
            --card-bg: #f1f5f9;            /* Nền Content */
            --border: #334155;             /* Màu viền */
            --text: #1e293b;               /* Chữ chính */
            --muted: #94a3b8;              /* Chữ phụ */
        }
       
        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            font-size: 14px;
            color: var(--text);
            letter-spacing: -0.01em;
        }

        .sidebar {
            width: 260px;
            min-width: 260px;
            background: var(--sidebar-bg);
            border-right: 1px solid var(--border);
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .brand {
            display: flex;
            gap: 12px;
            align-items: center;
            padding: 11px 20px;
            border-bottom: 1px solid var(--border);
        }

        .brand-icon {
            width: 42px;
            height: 42px;
            background: var(--primary);
            color: #fff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .brand strong {
            font-size: 1.1rem;
            color: #fff;
            font-weight: 700;
        }

        .brand .text-muted {
            color: var(--muted) !important;
        }

        .menu-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            margin: 4px 15px; 
            border-radius: 10px;
            color: var(--muted);
            text-decoration: none;
            font-weight: 500;
            transition: all 0.2s ease;
        }

        .menu-link i {
            font-size: 1.2rem;
        }

        .menu-link:hover {
            background: rgba(255, 255, 255, 0.05);
            color: #fff;
        }

        .menu-link.active {
            background: var(--primary);
            color: #fff !important;
            font-weight: 600;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.4);
        }

        hr {
            border-top: 1px solid var(--border);
            margin: 20px 0;
            opacity: 0.5;
        }

        .main {
            display: flex;
            flex-direction: column;
            flex-grow: 1; 
            height: 100vh;
            overflow: hidden;
        }

        .topbar {
            background: var(--topbar-bg);
            border-bottom: 1px solid var(--border);
            padding: 0 32px;
            height: 70px;
            min-height: 70px;
            display: flex;
            align-items: center;
            z-index: 10;
        }

        .topbar .fw-semibold {
            color: #fff;
        }

        .btn-outline-danger {
            border-color: #450a0a;
            background: rgba(239, 68, 68, 0.1);
            color: #f87171;
            font-weight: 500;
            border-radius: 8px;
        }

        .btn-outline-danger:hover {
            background: #ef4444;
            color: #fff;
        }

        .p-4 {
            padding: 1.5rem !important;
            flex-grow: 1; 
            display: flex;
            flex-direction: column;
            overflow-y: auto; 
        }

        .content {
            background: var(--card-bg);
            border-radius: 16px;
            padding: 30px;
            border: 1px solid var(--border);
            color: var(--text);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.3);
            
            flex-grow: 1; 
            width: 100%;  
            display: flex;
            flex-direction: column;
        }

        .content table, .content h1, .content h2, .content h3, .content label {
            color: var(--text) !important;
        }

        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: var(--bg);
        }
        ::-webkit-scrollbar-thumb {
            background: var(--border);
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: var(--muted);
        }
    </style>

    @stack('css')
</head>

<body>

<div class="d-flex">

    <aside class="sidebar">
        <div class="brand">
            <div class="brand-icon">
                <img src="{{asset('assetShop\images\icons\CabyShopTrang.png')}}" alt="" width="45">
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

            <a href="{{ route('admin.about.edit') }}"
               class="menu-link {{ request()->routeIs('admin.about.*') ? 'active' : '' }}">
                <i class="bi bi-phone"></i> About Us
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

            <hr>

             <a href="{{ route('admin.user.index') }}" class="menu-link" style="margin-bottom:30px;">
                <i class="bi bi-people"></i> Tài khoản
            </a>
        </div>
    </aside>

    <main class="flex-fill main">

      <div class="topbar d-flex justify-content-between align-items-center">

        <div class="fw-semibold">
            Xin chào, {{ auth()->user()->USER_NAME }}
        </div>

        <div class="d-flex align-items-center gap-3">
            <a href="{{ route('shop') }}" class="menu-link">
                <i class="bi bi-shop me-1"></i> Vào Shop
            </a>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="btn btn-outline-danger btn-sm rounded-pill px-3">
                    <i class="bi bi-box-arrow-right me-1"></i> Đăng xuất
                </button>
            </form>
        </div>

    </div>


        <div class="p-4">
            <div class="content">
                @yield('body')
                @yield('scripts')
            </div>
        </div>

    </main>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('js')
</body>
</html>
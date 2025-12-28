<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CapyShop</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --bs-primary: #135bec;
            --bs-body-bg: #f8f9fc;
            --bs-body-color: #0d121b;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bs-body-bg);
            color: var(--bs-body-color);
        }

        a { text-decoration: none; }

        .material-symbols-outlined {
            vertical-align: middle;
        }

        .text-primary-gradient {
            background: linear-gradient(to right, #135bec, #9333ea);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .rounded-4 { border-radius: 1rem; }
        .rounded-5 { border-radius: 1.5rem; }

        .card-hover {
            transition: all .3s ease;
        }

        .card-hover:hover {
            transform: translateY(-6px);
            box-shadow: 0 10px 25px rgba(0,0,0,.12);
        }

        .btn-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0;
        }

        .product-img-zoom {
            transition: transform .4s;
        }

        .group:hover .product-img-zoom {
            transform: scale(1.1);
        }

        .text-truncate-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .bg-hero { background: #f0f4ff; }
        .bg-dark-section { background: #101622; }

        .blur-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(64px);
            z-index: 0;
        }
    </style>
</head>

<body>

<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
    <div class="container-xl">
        <a class="navbar-brand fw-bold d-flex align-items-center gap-2" href="#">
            <div class="bg-primary text-white rounded-3 d-flex align-items-center justify-content-center" style="width:36px;height:36px;">
                <span class="material-symbols-outlined">bolt</span>
            </div>
            CapyShop
        </a>

        <button class="navbar-toggler border-0" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="material-symbols-outlined">menu</span>
        </button>

        <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav mx-auto gap-3 fw-semibold">
                <li class="nav-item"><a class="nav-link text-primary" href="{{ route('shop') }}">Trang chủ</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('shop.about') }}">Về Chúng Tôi</a></li>
            </ul>

<div class="d-flex align-items-center gap-3">

    @guest
        <a href="{{ route('login') }}"
           class="btn btn-sm btn-outline-primary rounded-pill fw-semibold d-flex align-items-center gap-1">
            <span class="material-symbols-outlined fs-6">
                login
            </span>
            Login
        </a>
    @endguest


    @auth
        <!-- USER NAME -->
        <span class="badge bg-light text-dark fw-semibold px-3 py-2 rounded-pill">
            <span class="material-symbols-outlined fs-6 align-middle me-1">
                person
            </span>
            {{ Auth::user()->USER_NAME }}
        </span>

        <!-- ADMIN CONTROL -->
        @if(Auth::user()->role === 'admin' || Auth::user()->role === 'superadmin')
            <a href="{{ route('admin.dashboard') }}"
               class="btn btn-sm btn-outline-danger rounded-pill fw-semibold d-flex align-items-center gap-1">
                <span class="material-symbols-outlined fs-6">
                    admin_panel_settings
                </span>
                Admin Control
            </a>
        @endif

        <!-- LOGOUT -->
        <form action="{{ route('logout') }}" method="POST" class="m-0">
            @csrf
            <button type="submit"
                class="btn btn-sm btn-outline-secondary rounded-pill d-flex align-items-center gap-1">
                <span class="material-symbols-outlined fs-6">
                    logout
                </span>
                Logout
            </button>
        </form>
    @endauth

</div>

        </div>
    </div>
</nav>

@yield('body')

<!-- ================= FOOTER ================= -->
<footer class="bg-white border-top py-4 text-center text-secondary">
    
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

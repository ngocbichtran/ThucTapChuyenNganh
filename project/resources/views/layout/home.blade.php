<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>@yield('title','Admin')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    @stack('css')
</head>
<body class="bg-light">

{{-- TOPBAR --}}
<nav class="navbar navbar-expand-lg navbar-white bg-white shadow-sm px-4">
    <a class="navbar-brand fw-bold" href="{{ route('admin.dashboard') }}">CAPYKHO</a>

    <div class="ms-auto d-flex gap-2">
        <a href="{{ route('admin.category.index') }}" class="btn btn-sm btn-outline-primary">Category</a>
        <a href="{{ route('admin.product.index') }}" class="btn btn-sm btn-outline-primary">Sản phẩm</a>
        <a href="{{ route('admin.tonkho.index') }}" class="btn btn-sm btn-outline-primary">Tồn kho</a>

        <div class="dropdown">
            <a class="btn btn-sm btn-light dropdown-toggle" data-bs-toggle="dropdown">
                {{ auth()->user()->USER_NAME }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="dropdown-item">Logout</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

{{-- CONTENT --}}
<main class="container-fluid px-4 py-4">
    @yield('body')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
@stack('js')
</body>
</html>

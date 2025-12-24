<header class="pc-header">
    <div class="header-wrapper d-flex justify-content-between align-items-center">

        <!-- LOGO -->
        <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-2">
            <img src="{{ asset('assets/images/CabyKhoĐen.png') }}" style="width:45px">
            <strong>CAPYKHO</strong>
        </a>

        <!-- NAV -->
        <div class="d-flex gap-3">
            <a href="{{ route('admin.category.index') }}" class="btn btn-light">Category</a>
            <a href="{{ route('admin.product.index') }}" class="btn btn-light">Sản phẩm</a>
            <a href="{{ route('admin.tonkho.index') }}" class="btn btn-light">Tồn kho</a>
            <a href="{{ route('admin.user.index') }}" class="btn btn-light">User</a>
        </div>

        <!-- USER -->
        <div class="dropdown">
            <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#">
                {{ auth()->user()->USER_NAME ?? 'Admin' }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item"
                       href="#"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </li>
            </ul>
        </div>

    </div>
</header>

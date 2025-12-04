<!-- ==================== SIDEBAR ==================== -->
    <nav class="pc-sidebar" style="background:#F8F9FA;">
        <div class="navbar-wrapper">

            <!-- Logo -->
            <div class="m-header">
              <a href="/" class="b-brand text-primary"
                style="display:flex;align-items:center;margin-top:20px;gap:10px;">
                  <img src="{{ asset('assets/images/CabyKhoĐen.png') }}"
                      style="width:75px; border-radius:50%;"
                      alt="logo">
                  <h3>CAPYKHO</h3>
              </a>

            </div>

            <!-- Menu -->
            <div class="navbar-content" style="margin-top:30px;">
                <ul class="pc-navbar">

                    <!-- Sản phẩm -->
                    <li class="pc-item pc-hasmenu">
                        <a class="pc-link">
                            <span class="pc-micon"><i class="ti ti-package"></i></span>
                            <span class="pc-mtext">Sản phẩm</span>
                            <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                        </a>
                        <ul class="pc-submenu">
                            <li class="pc-item"><a class="pc-link" href="{{ route('admin.category.index') }}">Danh sách category</a></li>
                            <li class="pc-item"><a class="pc-link" href="{{ route('admin.product.index') }}">Danh sách sản phẩm</a></li>
                        </ul>
                    </li>

                    <!-- Kho -->
                    <li class="pc-item pc-hasmenu">
                        <a class="pc-link">
                            <span class="pc-micon"><i class="ti ti-transfer-in"></i></span>
                            <span class="pc-mtext">Kho</span>
                            <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                        </a>
                        <ul class="pc-submenu">
                            <li class="pc-item"><a class="pc-link" href="{{ route('admin.nhap.index') }}">Danh sách nhập kho</a></li>
                            <li class="pc-item"><a class="pc-link" href="{{ route('admin.xuat.index') }}">Danh sách xuất kho</a></li>
                            <li class="pc-item"><a class="pc-link" href="{{ route('admin.tonkho.index') }}">Danh sách trong kho</a></li>
                            <li class="pc-item"><a class="pc-link" href="{{ route('storage-lichsukho') }}">Lịch sử kho</a></li>
                        </ul>
                    </li>

                    <!-- Quản lý -->
                    <li class="pc-item pc-hasmenu">
                        <a class="pc-link">
                            <span class="pc-micon"><i class="ti ti-puzzle"></i></span>
                            <span class="pc-mtext">Quản lý</span>
                            <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                        </a>
                        <ul class="pc-submenu">
                            <li class="pc-item"><a class="pc-link" href="{{ route('admin.user.index') }}">Danh sách user</a></li>
                            <li class="pc-item"><a class="pc-link" href="{{ route('admin.role.index') }}">Danh sách quyền</a></li>
                        </ul>
                    </li>

                    <!-- Chuyển sang shop -->
                    <li style="margin-left:50px;margin-top:50px;list-style:none;">
                        <a href="/shop" class="pc-link"
                           style="display:flex;align-items:center;gap:8px;background:linear-gradient(90deg,#ffd6e8,#ffe7f3);padding:10px 18px;border-radius:25px;color:#ff4fa3;font-weight:600;text-decoration:none;transition:0.3s;box-shadow:0 2px 6px rgba(255,192,203,0.4);">
                            <span class='pc-micon'><i class='ti ti-heart'></i></span>
                            <span class='pc-mtext'>CapyShop</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
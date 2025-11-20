<!DOCTYPE html>
<html lang="en">
<!-- [Head] start -->

<head>
  <title>CapyKho</title>
  <!-- [Meta] -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Mantis is made using Bootstrap 5 design framework. Download the free admin template & use it for your project.">
  <meta name="keywords" content="Mantis, Dashboard UI Kit, Bootstrap 5, Admin Template, Admin Dashboard, CRM, CMS, Bootstrap Admin Template">
  <meta name="author" content="CodedThemes">

  <!-- [Favicon] icon -->
<link rel="icon" href="{{ asset('assetShop/images/icons/CabyShopTrang.png') }}" type="image/x-icon"> <!-- [Google Font] Family -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Public+Sans:wght@300;400;500;600;700&display=swap" id="main-font-link">
<!-- [Tabler Icons] https://tablericons.com -->
<link rel="stylesheet" href="{{ asset('assets/fonts/tabler-icons.min.css') }}" >
<!-- [Feather Icons] https://feathericons.com -->
<link rel="stylesheet" href="{{ asset('assets/fonts/feather.css') }}" >
<!-- [Font Awesome Icons] https://fontawesome.com/icons -->
<link rel="stylesheet" href="{{ asset('assets/fonts/fontawesome.css') }}" >
<!-- [Material Icons] https://fonts.google.com/icons -->
<link rel="stylesheet" href="{{ asset('assets/fonts/material.css') }}" >
<!-- [Template CSS Files] -->
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" id="main-style-link" >
<link rel="stylesheet" href="{{ asset('assets/css/style-preset.css') }}" >

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-direction="ltr" data-pc-theme="light">
  <!-- [ Pre-loader ] start -->
<div class="loader-bg">
  <div class="loader-track">
    <div class="loader-fill"></div>
  </div>
</div>
<!-- [ Pre-loader ] End -->
 <!-- [ Sidebar Menu ] start -->
<nav class="pc-sidebar" style="background-color: #F5F5F5;">
  <div class="navbar-wrapper">
    <div class="m-header">
      <a href="/" class="b-brand text-primary" style="display: flex; margin-top: 20px; align-items: center; gap: 10px; text-decoration: none;">
        <!-- ========   Change your logo from here   ============ -->
        <img src="{{asset('assets/images/CabyKhoTrang.png')}}"  style="width: 75px; height: auto;" alt="logo">
        <h3>CAPYKHO</h3>
      </a>
    </div>


    <!-- Thanh menu dọc -->
    <div class="navbar-content" style="margin-top:30px;">
      <ul class="pc-navbar">
        <!-- //Sản phẩm start -->
        <li class="pc-item pc-hasmenu">
          <a class="pc-link"><span class="pc-micon"><i class="ti ti-package"></i></span><span class="pc-mtext">Sản phẩm
              </span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="{{route('product-category')}}">Danh sách category</a></li>
            <li class="pc-item"><a class="pc-link" href="{{route('product-product')}}">Danh sách sản phẩm</a></li>
           
          </ul>
        </li>
        <!-- //Sản phẩm end -->
         <!-- //Kho start -->
        <li class="pc-item pc-hasmenu">
          <a class="pc-link"><span class="pc-micon"><i class="ti ti-transfer-in "></i></span><span class="pc-mtext">Kho
              </span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="{{route('storage-nhapkho')}}">Danh sách nhập kho</a></li>
            <li class="pc-item"><a class="pc-link" href="{{route('storage-xuatkho')}}">Danh sách xuất kho</a></li>
            <li class="pc-item"><a class="pc-link" href="{{route('storage-trongkho')}}">Danh sách trong kho</a></li>
            <li class="pc-item"><a class="pc-link" href="{{route('storage-lichsukho')}}">Lịch sử kho</a></li>
          </ul>
        </li>
        <!-- //Kho end -->
        <!-- //Quản lý start -->
        <li class="pc-item pc-hasmenu">
          <a class="pc-link"><span class="pc-micon"><i class="ti ti-puzzle"></i></span><span class="pc-mtext">Quản lý
              </span><span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
          <ul class="pc-submenu">
            <li class="pc-item"><a class="pc-link" href="{{route('manegement-user')}}">Danh sách user</a></li>
            <li class="pc-item"><a class="pc-link" href="{{route('manegement-role')}}">Danh sách quyền</a></li>
          </ul>
        </li>
        <!-- //Quản lý end -->
        <!-- Chuyển đến trang shop -->
        <li style="list-style: none; margin-left: 50px; margin-top: 50px;">
          <a href='/shop' class='pc-link' 
            style='
                display: inline-flex;
                align-items: center;
                gap: 8px;
                background: linear-gradient(90deg, #ffd6e8, #ffe7f3);
                padding: 10px 18px;
                border-radius: 25px;
                color: #ff4fa3;
                font-weight: 600;
                text-decoration: none;
                transition: all 0.3s ease;
                box-shadow: 0 2px 6px rgba(255, 192, 203, 0.4);
            '
            onmouseover="this.style.background='linear-gradient(90deg, #ffb3d9, #ffd6e8)'; this.style.transform='scale(1.05)'; this.style.color='white';"
            onmouseout="this.style.background='linear-gradient(90deg, #ffd6e8, #ffe7f3)'; this.style.transform='scale(1)'; this.style.color='#ff4fa3';">
            <span class='pc-micon' style='font-size:18px;'>
              <i class='ti ti-heart'></i>
            </span>
            <span class='pc-mtext'>CapyShop</span>
          </a>
        </li>

      </ul>
    </div>
  </div>
</nav>

<!-- [ Sidebar Menu ] end --> 
 
<!-- [ Header Topbar ] start -->
<header class="pc-header">
  <div class="header-wrapper"> 
<!-- [Mobile Media Block] start -->
<div class="me-auto pc-mob-drp">
  <ul class="list-unstyled">
    <!-- ======= Menu collapse Icon ===== -->
    <li class="pc-h-item pc-sidebar-collapse">
      <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
        <i class="ti ti-menu-2"></i>
      </a>
    </li>
    <li class="pc-h-item pc-sidebar-popup">
      <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
        <i class="ti ti-menu-2"></i>
      </a>
    </li>
    <li class="dropdown pc-h-item d-inline-flex d-md-none">
      <a
        class="pc-head-link dropdown-toggle arrow-none m-0"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        aria-expanded="false"
      >
        <i class="ti ti-search"></i>
      </a>
      <div class="dropdown-menu pc-h-dropdown drp-search">
        <form class="px-3">
          <div class="form-group mb-0 d-flex align-items-center">
            <i data-feather="search"></i>
            <input type="search" class="form-control border-0 shadow-none" placeholder="Search here. . .">
          </div>
        </form>
      </div>
    </li>
    <li class="pc-h-item d-none d-md-inline-flex">
      <form class="header-search">
        <i data-feather="search" class="icon-search"></i>
        <input type="search" class="form-control" placeholder="Search here. . .">
      </form>
    </li>
  </ul>
</div>
<!-- [Mobile Media Block end] -->
<div class="ms-auto">
  <ul class="list-unstyled">
    
    <li class="dropdown pc-h-item header-user-profile">
      <a
        class="pc-head-link dropdown-toggle arrow-none me-0"
        data-bs-toggle="dropdown"
        href="#"
        role="button"
        aria-haspopup="false"
        data-bs-auto-close="outside"
        aria-expanded="false"
      >
       <img src="{{ asset('assets/images/user/avatar-2.jpg') }}" class="user-avtar">

        <span>Stebin Ben</span>
      </a>
      <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
        <div class="dropdown-header">
          <div class="d-flex mb-1">
            <div class="flex-shrink-0">
              <img src="{{asset('assets/images/user/avatar-2.jpg')}}" alt="user-image" class="user-avtar wid-35">
            </div>
            <div class="flex-grow-1 ms-3">
              <h6 class="mb-1">Stebin Ben</h6>
              <span>UI/UX Designer</span>
            </div>
            <a href="#!" class="pc-head-link bg-transparent"></a>
          </div>
        </div>
        <ul class="nav drp-tabs nav-fill nav-tabs" id="mydrpTab" role="tablist">
          <!-- Nút đăng xuất -->
          <li class="nav-item">
              <a class="nav-link" href="#"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  Logout
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </li>
        </ul>
        <div class="tab-content" id="mysrpTabContent">
          <div class="tab-pane fade show active" id="drp-tab-1" role="tabpanel" aria-labelledby="drp-t1" tabindex="0">
            <a href="#!" class="dropdown-item">
              <i class="ti ti-edit-circle"></i>
              <span>Edit Profile</span>
            </a>
            <a href="#!" class="dropdown-item">
              <i class="ti ti-user"></i>
              <span>View Profile</span>
            </a>
          </div>



          <div class="tab-pane fade" id="drp-tab-2" role="tabpanel" aria-labelledby="drp-t2" tabindex="0">
            <a href="#!" class="dropdown-item">
              <i class="ti ti-help"></i>
              <span>Support</span>
            </a>
            <a href="#!" class="dropdown-item">
              <i class="ti ti-user"></i>
              <span>Account Settings</span>
            </a>
            <a href="#!" class="dropdown-item">
              <i class="ti ti-lock"></i>
              <span>Privacy Center</span>
            </a>
            <a href="#!" class="dropdown-item">
              <i class="ti ti-messages"></i>
              <span>Feedback</span>
            </a>
            <a href="#!" class="dropdown-item">
              <i class="ti ti-list"></i>
              <span>History</span>
            </a>
          </div>
        </div>
        
      </div>
    </li>
  </ul>
</div>
 </div>
</header>
<!-- [ Header ] end -->

<div id="pc-container">
    @yield('body')
</div>


<!-- [Page Specific JS] start -->
<script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>
<script src="{{ asset('assets/js/pages/dashboard-default.js') }}"></script>
<!-- [Page Specific JS] end -->

<!-- REQUIRED JS (ĐÚNG THỨ TỰ) -->

<!-- 1. Popper -->
<script src="{{ asset('assets/js/plugins/popper.min.js') }}"></script>

<!-- 2. Bootstrap -->
<script src="{{ asset('assets/js/plugins/bootstrap.min.js') }}"></script>

<!-- 3. Simplebar -->
<script src="{{ asset('assets/js/plugins/simplebar.min.js') }}"></script>

<!-- 4. Apexchart (nếu cần) -->
<script src="{{ asset('assets/js/plugins/apexcharts.min.js') }}"></script>

<!-- 5. Feather icons -->
<script src="{{ asset('assets/js/plugins/feather.min.js') }}"></script>

<!-- 6. PCoded (UI script của template) -->
<script src="{{ asset('assets/js/pcoded.js') }}"></script>

  
  <script>layout_change('light');</script>
  
  
  
  
  <script>change_box_container('false');</script>
  
  
  
  <script>layout_rtl_change('false');</script>
  
  
  <script>preset_change("preset-1");</script>
  
  
  <script>font_change("Public-Sans");</script>
  
<script>
$(document).ready(function() {

  $(document).pjax('a.pc-link[href!="#"]', '#pc-container', { timeout: 2000 });

  $('.pc-hasmenu > .pc-link').on('click', function(e) {
    e.preventDefault();
    $(this).parent().toggleClass('pc-trigger');
  });

});

$(document).on('pjax:end', function() {
  feather.replace();
});
</script>


</body>
<!-- [Body] end -->
</html>
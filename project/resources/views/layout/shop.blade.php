<!DOCTYPE html>
<html lang="en">
<head>
	<title>CapyShop</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="{{ asset('assetShop/images/icons/favicon.png') }}"/>
	<link rel="stylesheet" type="text/css" href="{{ asset('assetShop/vendor/bootstrap/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assetShop/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assetShop/fonts/iconic/css/material-design-iconic-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assetShop/fonts/linearicons-v1.0.0/icon-font.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assetShop/vendor/animate/animate.css') }}">	
	<link rel="stylesheet" type="text/css" href="{{ asset('assetShop/vendor/css-hamburgers/hamburgers.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assetShop/vendor/animsition/css/animsition.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assetShop/vendor/select2/select2.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assetShop/vendor/daterangepicker/daterangepicker.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assetShop/vendor/slick/slick.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assetShop/vendor/MagnificPopup/magnific-popup.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assetShop/vendor/perfect-scrollbar/perfect-scrollbar.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assetShop/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('assetShop/css/main.css') }}">
	<!--===============================================================================================-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assetProduct/css/vendor.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assetProduct/css/styleDemo.css') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Open+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">



	<!--===============================================================================================-->
	 <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('assetCategory/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assetCategory/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assetCategory/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assetCategory/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assetCategory/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assetCategory/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assetCategory/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assetCategory/css/style.css') }}" type="text/css">

	<!--===============================================================================================-->
</head>
<body class="animsition">
	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop">
			<div class="top-bar">
				<div class="content-topbar flex-sb-m h-full container">
				<div class="left-top-bar">
				Chất Lượng Hàng Đầu
			</div>

			<div class="right-top-bar flex-w h-full">

				@guest
					<a href="{{ route('login') }}" class="flex-c-m trans-04 p-lr-25">
						Login
					</a>
				@endguest

				@auth
					<span class="flex-c-m trans-04 p-lr-15">
						{{ Auth::user()->USER_NAME }}
					</span>

					<form action="{{ route('logout') }}" method="POST">
						@csrf
						<button type="submit" class="flex-c-m trans-04 p-lr-25"
							style="background:none;border:none;color:inherit;">
							Logout
						</button>
					</form>
				@endauth

			</div>

			</div>
			<div class="wrap-menu-desktop">
			<nav class="limiter-menu-desktop container">
					<!-- Logo desktop -->		
					<div class="logo">
						
						<h3 style="margin-left:10px;">CapyShop</h3>
					</div>
					
					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="{{route('shop')}}">Home</a>
							</li>

						</ul>
					</div>	

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11"
							style="display: flex; align-items: center; padding: 10px 10px; transition: 0.3s; width: 325px; border-bottom: 1px solid #ccc;">
							
							<!-- Icon tìm kiếm -->
							<i class="zmdi zmdi-search"
							style="font-size: 18px; color: #2b101eff; margin-right: 8px;"></i>

							<!-- Ô nhập liệu -->
							<input class="mtext-107 cl2 size-114 plh2 p-r-15"
								type="text"
								name="search-product"
								placeholder="Tìm sản phẩm"
								style="border: none; outline: none; background: transparent; width: 100%; font-size: 14px; color: #555;">
						</div>



						

						<!-- <a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti" data-notify="0">
							<i class="zmdi zmdi-favorite-outline"></i>
						</a> -->
					</div>
				</nav>
			</div>	
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->		
			<div class="logo-mobile">
				<a href="{{route('shop')}}"><img src="{{asset('assetShop/images/icons/CabyShopTrang.png')}}" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>

				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart" data-notify="2">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti" data-notify="0">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>


		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="topbar-mobile">
				<li>
					<div class="left-top-bar">
						Chất Lượng Hàng Đầu
					</div>
				</li>

				<li>
					<div class="right-top-bar flex-w h-full">
						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Login
						</a>

						<a href="#" class="flex-c-m p-lr-10 trans-04">
							Logout
						</a>
					</div>
				</li>
			</ul>

			<ul class="main-menu-m">
				<li>
					<a href="{{route('shop')}}">Home</a>
					<span class="arrow-main-menu-m">
						<i class="fa fa-angle-right" aria-hidden="true"></i>
					</span>
				</li>


			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>
	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>
			
			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="{{asset('assetShop/images/item-cart-01.jpg')}}" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								White Shirt Pleat
							</a>

							<span class="header-cart-item-info">
								1 x $19.00
							</span>
						</div>
					</li>

					<li class="header-cart-item flex-w flex-t m-b-12">
						<div class="header-cart-item-img">
							<img src="{{asset('assetShop/images/item-cart-02.jpg')}}" alt="IMG">
						</div>

						<div class="header-cart-item-txt p-t-8">
							<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
								Converse All Star
							</a>

							<span class="header-cart-item-info">
								1 x $39.00
							</span>
						</div>
					</li>
				</ul>
				
				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						Total: $75.00
					</div>

					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>

						<a href="shoping-cart.html" class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
							Check Out
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
@yield('body')
<footer style="
  background: linear-gradient(180deg, #220f19ff, #190910ff);
  color: #927b7bff;
  padding-top: 60px;
  padding-bottom: 30px;
  font-family: 'Poppins', sans-serif;
  ">
  <div class="container">
    <div class="row">

      <!-- Categories -->
      <div class="col-sm-6 col-lg-3" style="margin-bottom: 40px;">
        <h4 style="color:#ff4fa3; font-weight:700; margin-bottom:20px;">Danh mục</h4>
        <ul style="list-style:none; padding:0;">
          <li style="margin-bottom:10px;">
            <a href="#" style="color:#7a6b6b; text-decoration:none;">Laptop</a>
          </li>
          <li style="margin-bottom:10px;">
            <a href="#" style="color:#7a6b6b; text-decoration:none;">Điện Thoại</a>
          </li>
          <li style="margin-bottom:10px;">
            <a href="#" style="color:#7a6b6b; text-decoration:none;">Phụ Kiện</a>
          </li>
        </ul>
      </div>

      <!-- Help -->
      <div class="col-sm-6 col-lg-3" style="margin-bottom: 40px;">
        <h4 style="color:#ff4fa3; font-weight:700; margin-bottom:20px;">Hỗ trợ</h4>
        <ul style="list-style:none; padding:0;">
          <li style="margin-bottom:10px;"><a href="#" style="color:#7a6b6b; text-decoration:none;">Theo dõi đơn hàng</a></li>
          <li style="margin-bottom:10px;"><a href="#" style="color:#7a6b6b; text-decoration:none;">Đổi trả</a></li>
          <li style="margin-bottom:10px;"><a href="#" style="color:#7a6b6b; text-decoration:none;">Giao hàng</a></li>
          <li style="margin-bottom:10px;"><a href="#" style="color:#7a6b6b; text-decoration:none;">Câu hỏi thường gặp</a></li>
        </ul>
      </div>

      <!-- Contact -->
      <div class="col-sm-6 col-lg-3" style="margin-bottom: 40px;">
        <h4 style="color:#ff4fa3; font-weight:700; margin-bottom:20px;">Liên hệ</h4>
        <p style="color:#7a6b6b;">
          Hãy ghé CapyShop hoặc gọi 0909-123-456 nhé!
        </p>
        <div style="margin-top: 15px;">
          <a href="#" style="margin-right:10px; color:#ff4fa3; font-size:20px;"><i class="fa fa-facebook"></i></a>
          <a href="#" style="margin-right:10px; color:#ff4fa3; font-size:20px;"><i class="fa fa-instagram"></i></a>
          <a href="#" style="color:#ff4fa3; font-size:20px;"><i class="fa fa-tiktok"></i></a>
        </div>
      </div>

      <!-- Newsletter -->
      <div class="col-sm-6 col-lg-3" style="margin-bottom: 40px;">
        <h4 style="color:#ff4fa3; font-weight:700; margin-bottom:20px;">Nhận tin mới</h4>
        <form>
          <input type="text" placeholder="email@example.com" style="
            width:100%;
            padding:10px;
            border-radius:20px;
            border:1px solid #ffcce1;
            outline:none;
            margin-bottom:10px;
          ">
          <button type="submit" style="
            background:#ffb6c1;
            border:none;
            color:white;
            padding:8px 20px;
            border-radius:20px;
            cursor:pointer;
            transition:0.3s;
          " onmouseover="this.style.background='#331323ff';" onmouseout="this.style.background='#32161bff';">
          Đăng ký
          </button>
        </form>
      </div>
    </div>

    <hr style="border-color:#ffcce1; margin:20px 0;">
    <p style="text-align:center; color:#7a6b6b; font-size:14px;">
      © <script>document.write(new Date().getFullYear());</script> CapyShop | Made with 🩷 by CapyTeam
    </p>
  </div>
</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="zmdi zmdi-chevron-up"></i>
		</span>
	</div>


<!--===============================================================================================-->	
	<script src="{{ asset('assetShop/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assetShop/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assetShop/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('assetShop/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assetShop/vendor/select2/select2.min.js') }}"></script>
	<script>
		$(".js-select2").each(function(){
			$(this).select2({
				minimumResultsForSearch: 20,
				dropdownParent: $(this).next('.dropDownSelect2')
			});
		})
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('assetShop/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('assetShop/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assetShop/vendor/slick/slick.min.js') }}"></script>
	<script src="{{ asset('assetShop/js/slick-custom.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assetShop/vendor/parallax100/parallax100.js') }}"></script>
	<script>
        $('.parallax100').parallax100();
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('assetShop/vendor/MagnificPopup/jquery.magnific-popup.min.js') }}"></script>
	<script>
		$('.gallery-lb').each(function() { // the containers for all your galleries
			$(this).magnificPopup({
		        delegate: 'a', // the selector for gallery item
		        type: 'image',
		        gallery: {
		        	enabled:true
		        },
		        mainClass: 'mfp-fade'
		    });
		});
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('assetShop/vendor/isotope/isotope.pkgd.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('assetShop/vendor/sweetalert/sweetalert.min.js') }}"></script>
	<script>
		$('.js-addwish-b2').on('click', function(e){
			e.preventDefault();
		});

		$('.js-addwish-b2').each(function(){
			var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-b2');
				$(this).off('click');
			});
		});

		$('.js-addwish-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");

				$(this).addClass('js-addedwish-detail');
				$(this).off('click');
			});
		});

		/*---------------------------------------------*/

		$('.js-addcart-detail').each(function(){
			var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});
	
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('assetShop/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
	<script>
		$('.js-pscroll').each(function(){
			$(this).css('position','relative');
			$(this).css('overflow','hidden');
			var ps = new PerfectScrollbar(this, {
				wheelSpeed: 1,
				scrollingThreshold: 1000,
				wheelPropagation: false,
			});

			$(window).on('resize', function(){
				ps.update();
			})
		});
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('assetShop/js/main.js') }}"></script>
<!--=============================================NEW==================================================-->
	<script src="{{ asset('assetProduct/js/jquery-1.11.0.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="{{ asset('assetProduct/js/plugins.js') }}"></script>
    <script src="{{ asset('assetProduct/js/script.js') }}"></script>

	<!--  -->
	 <!-- Js Plugins -->
    <script src="{{ asset('assetCategory/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('assetCategory/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assetCategory/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assetCategory/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assetCategory/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('assetCategory/js/mixitup.min.js') }}"></script>
    <script src="{{ asset('assetCategory/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assetCategory/js/main.js') }}"></script>
</body>
</html>
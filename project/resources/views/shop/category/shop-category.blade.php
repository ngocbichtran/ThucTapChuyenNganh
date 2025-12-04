@extends('layout/shop')
@section('body')

<div class="bg0 p-b-140">
    <div class="container">

        <!-- Header bộ lọc -->
        <div class="flex-w flex-sb-m p-b-40" style="margin-top: 70px;">

            <!-- Tabs danh mục -->
            <div class="flex-w flex-l-m m-tb-10">

                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-25 m-tb-5 how-active1" data-filter="*">
                    Tất cả sản phẩm
                </button>

                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-25 m-tb-5" data-filter=".laptop">
                    Laptop
                </button>

                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-25 m-tb-5" data-filter=".phone">
                    Điện thoại
                </button>

                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-25 m-tb-5" data-filter=".accessory">
                    Phụ kiện
                </button>

            </div>

            <!-- Nút mở filter -->
            <div class="flex-w flex-c-m m-tb-10">
                <div class="flex-c-m stext-106 cl6 size-104 bor4 pointer hov-btn3 trans-04 m-r-8 js-show-filter">
                    <i class="icon-filter cl2 m-r-6 fs-15 zmdi zmdi-filter-list"></i>
                    <i class="icon-close-filter cl2 m-r-6 fs-15 zmdi zmdi-close dis-none"></i>
                    Bộ lọc
                </div>
            </div>

        </div>

        <!-- Search -->
        <div class="dis-none panel-search w-full p-b-20">
            <div class="bor8 dis-flex p-l-15 bg-light">
                <button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
                    <i class="zmdi zmdi-search"></i>
                </button>

                <input class="mtext-107 cl2 size-114 p-r-15" 
                       type="text" name="search-product" 
                       placeholder="Tìm kiếm sản phẩm...">
            </div>
        </div>

        <!-- Filter -->
        <div class="dis-none panel-filter w-full p-t-10">
            <div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-30 p-b-20">

                <!-- Sort By -->
                <div class="filter-col p-b-27 m-r-30">
                    <div class="mtext-102 cl2 p-b-15">Sắp xếp</div>
                    <ul>
                        <li class="p-b-6"><a href="#" class="filter-link stext-106">Mặc định</a></li>
                        <li class="p-b-6"><a href="#" class="filter-link stext-106">Phổ biến</a></li>
                        <li class="p-b-6"><a href="#" class="filter-link stext-106">Đánh giá cao</a></li>
                        <li class="p-b-6"><a href="#" class="filter-link stext-106 filter-link-active">Sản phẩm mới</a></li>
                        <li class="p-b-6"><a href="#" class="filter-link stext-106">Giá tăng dần</a></li>
                        <li class="p-b-6"><a href="#" class="filter-link stext-106">Giá giảm dần</a></li>
                    </ul>
                </div>

                <!-- Price -->
                <div class="filter-col p-b-27 m-r-30">
                    <div class="mtext-102 cl2 p-b-15">Khoảng giá</div>
                    <ul>
                        <li class="p-b-6"><a href="#" class="filter-link stext-106 filter-link-active">Tất cả</a></li>
                        <li class="p-b-6"><a href="#" class="filter-link stext-106">Dưới 1 triệu</a></li>
                        <li class="p-b-6"><a href="#" class="filter-link stext-106">1 – 5 triệu</a></li>
                        <li class="p-b-6"><a href="#" class="filter-link stext-106">5 – 10 triệu</a></li>
                        <li class="p-b-6"><a href="#" class="filter-link stext-106">10 – 20 triệu</a></li>
                        <li class="p-b-6"><a href="#" class="filter-link stext-106">Trên 20 triệu</a></li>
                    </ul>
                </div>

                <!-- Color -->
                <div class="filter-col p-b-27 m-r-30">
                    <div class="mtext-102 cl2 p-b-15">Màu sắc</div>
                    <ul>
                        <li class="p-b-6"><span class="fs-15 m-r-6" style="color:#222"><i class="zmdi zmdi-circle"></i></span> <a href="#" class="filter-link stext-106">Đen</a></li>
                        <li class="p-b-6"><span class="fs-15 m-r-6" style="color:#4272d7"><i class="zmdi zmdi-circle"></i></span> <a href="#" class="filter-link stext-106 filter-link-active">Xanh</a></li>
                        <li class="p-b-6"><span class="fs-15 m-r-6" style="color:#b3b3b3"><i class="zmdi zmdi-circle"></i></span> <a href="#" class="filter-link stext-106">Xám</a></li>
                        <li class="p-b-6"><span class="fs-15 m-r-6" style="color:#00ad5f"><i class="zmdi zmdi-circle"></i></span> <a href="#" class="filter-link stext-106">Xanh lá</a></li>
                        <li class="p-b-6"><span class="fs-15 m-r-6" style="color:#fa4251"><i class="zmdi zmdi-circle"></i></span> <a href="#" class="filter-link stext-106">Đỏ</a></li>
                    </ul>
                </div>

                <!-- Tags -->
                <div class="filter-col p-b-27">
                    <div class="mtext-102 cl2 p-b-15">Tags</div>
                    <div class="flex-w p-t-4 m-r--5">
                        <a href="#" class="flex-c-m stext-107 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">Laptop</a>
                        <a href="#" class="flex-c-m stext-107 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">Gaming</a>
                        <a href="#" class="flex-c-m stext-107 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">Apple</a>
                        <a href="#" class="flex-c-m stext-107 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">Phụ kiện</a>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection

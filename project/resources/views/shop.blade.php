@extends('layout/shop')
@section('body')

<!-- Banner -->
<div class="main-banner" style="margin-top:100px;">
    <div class="container text-center">
        <img src="{{ asset('assetShop/images/icons/Bannershop2.png') }}" class="img-fluid" alt="Banner">
    </div>
</div>

<!-- Categories Section -->
<section class="categories">
    <div class="container" style="margin-top:100px;">
        <div class="row">
            <div class="categories__slider owl-carousel">
                @foreach ($categories as $cate)
                <div class="col-lg-3">
                    <div class="categories__item set-bg" data-setbg="{{ asset('assetCategory/img/categories/cat-1.jpg')}}">
                        <h5><a href="#">{{ $cate->TYPE }}</a></h5>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- Product -->
<section class="bg0 p-t-23 p-b-140" style="margin-top:70px;">
    <div class="container">

        <h3 class="ltext-103 cl5">Sản Phẩm Nổi Bật</h3>

        <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4" style="margin-top:50px;">
            @foreach ($products as $pro)
            <div class="col">
                <div class="product-item border rounded p-3 shadow-sm">

                    <figure class="text-center">
                        <a href="#">
                            <img src="{{$pro->IMG_URL}}" class="img-fluid tab-image">
                        </a>
                    </figure>

                    <h5 class="mt-2">{{ $pro->NAME }}</h5>
                    <div class="price fw-bold mb-2">{{ number_format($pro->PRICE) }} đ</div>

                    <div class="d-flex align-items-center justify-content-between">
                        <div class="input-group product-qty" style="width: 120px;">
                            <button type="button" class="btn btn-danger btn-number" data-type="minus">-</button>
                            <input type="text" class="form-control text-center" value="1">
                            <button type="button" class="btn btn-success btn-number" data-type="plus">+</button>
                        </div>

                        <a href="#" class="btn btn-outline-primary d-flex align-items-center gap-1">
                            <iconify-icon icon="uil:shopping-cart"></iconify-icon> Add
                        </a>
                    </div>

                </div>
            </div>
            @endforeach
        </div>

        <!-- Load More -->
        <div class="flex-c-m flex-w w-full p-t-45">
            <a href="{{ route('shop') }}" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
                Load More
            </a>
        </div>

    </div>
</section>
@endsection

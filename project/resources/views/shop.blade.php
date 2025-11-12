@extends('layout/shop')
@section('body')


<!-- ***** Banner Start ***** -->
<div class="main-banner" style="margin-top:100px;">
  <div class="container text-center">
    <img src="{{ asset('assetShop/images/icons/Bannershop2.png') }}" alt="Banner" class="img-fluid" >
  </div>
</div>


    <!-- ***** Banner End ***** -->

 	<!-- Categories Section Begin -->
    <section class="categories">
        <div class="container" style="margin-top:100px;">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('assetCategory/img/categories/cat-1.jpg')}}">
                            <h5><a href="#">Laptop</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('assetCategory/img/categories/cat-2.jpg')}}">
                            <h5><a href="#">Dried Fruit</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('assetCategory/img/categories/cat-3.jpg')}}">
                            <h5><a href="#">Vegetables</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('assetCategory/img/categories/cat-4.jpg')}}">
                            <h5><a href="#">drink fruits</a></h5>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{ asset('assetCategory/img/categories/cat-5.jpg')}}">
                            <h5><a href="#">drink fruits</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

	<!-- Product -->
	<section class="bg0 p-t-23 p-b-140" style="margin-top:70px;">
		<div class="container">
			<div class="p-b-10">
				<h3 class="ltext-103 cl5">
					Sản Phẩm Nổi Bật
				</h3>
			</div>
		<!--  -->
		{{-- Nội dung tab --}}
		<div class="tab-content" id="nav-tabContent" style="margin-top:50px;">
	 		{{-- Tab 1 --}}
            <div class="tab-pane fade show active" id="nav-fruits" role="tabpanel" aria-labelledby="nav-fruits-tab">
                <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                    <div class="col">
                        <div class="product-item border rounded p-3 shadow-sm">
                            <a href="#" class="btn-wishlist position-absolute top-0 end-0 m-2">
                                <svg width="24" height="24"><use xlink:href="#heart"></use></svg>
                            </a>
                            <figure class="text-center">
                                <a href="#">
                                    <img src="{{ asset('assetProduct/images/thumb-honey.jpg') }}" class="img-fluid tab-image" alt="Cucumber Juice">
                                </a>
                            </figure>
                            <h5 class="mt-2">Sunstar Fresh Melon Juice</h5>
                            <div class="text-muted small">1 Unit</div>
                            <div class="rating mb-2">
                                <svg width="16" height="16" class="text-warning"><use xlink:href="#star-solid"></use></svg> 4.5
                            </div>
                            <div class="price fw-bold mb-2">$18.00</div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="input-group product-qty" style="width: 120px;">
                                    <button type="button" class="btn btn-danger btn-number" data-type="minus">
                                        <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                                    </button>
                                    <input type="text" class="form-control text-center" value="1">
                                    <button type="button" class="btn btn-success btn-number" data-type="plus">
                                        <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                                    </button>
                                </div>
                                <a href="#" class="btn btn-outline-primary d-flex align-items-center gap-1">
                                    <iconify-icon icon="uil:shopping-cart"></iconify-icon> Add
                                </a>
                            </div>
                        </div>
                    </div>
					 <div class="col">
                        <div class="product-item border rounded p-3 shadow-sm">
                            <a href="#" class="btn-wishlist position-absolute top-0 end-0 m-2">
                                <svg width="24" height="24"><use xlink:href="#heart"></use></svg>
                            </a>
                            <figure class="text-center">
                                <a href="#">
                                    <img src="{{ asset('assetProduct/images/thumb-honey.jpg') }}" class="img-fluid tab-image" alt="Cucumber Juice">
                                </a>
                            </figure>
                            <h5 class="mt-2">Sunstar Fresh Melon Juice</h5>
                            <div class="text-muted small">1 Unit</div>
                            <div class="rating mb-2">
                                <svg width="16" height="16" class="text-warning"><use xlink:href="#star-solid"></use></svg> 4.5
                            </div>
                            <div class="price fw-bold mb-2">$18.00</div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="input-group product-qty" style="width: 120px;">
                                    <button type="button" class="btn btn-danger btn-number" data-type="minus">
                                        <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                                    </button>
                                    <input type="text" class="form-control text-center" value="1">
                                    <button type="button" class="btn btn-success btn-number" data-type="plus">
                                        <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                                    </button>
                                </div>
                                <a href="#" class="btn btn-outline-primary d-flex align-items-center gap-1">
                                    <iconify-icon icon="uil:shopping-cart"></iconify-icon> Add
                                </a>
                            </div>
                        </div>
                    </div>
					 <div class="col">
                        <div class="product-item border rounded p-3 shadow-sm">
                            <a href="#" class="btn-wishlist position-absolute top-0 end-0 m-2">
                                <svg width="24" height="24"><use xlink:href="#heart"></use></svg>
                            </a>
                            <figure class="text-center">
                                <a href="#">
                                    <img src="{{ asset('assetProduct/images/thumb-honey.jpg') }}" class="img-fluid tab-image" alt="Cucumber Juice">
                                </a>
                            </figure>
                            <h5 class="mt-2">Sunstar Fresh Melon Juice</h5>
                            <div class="text-muted small">1 Unit</div>
                            <div class="rating mb-2">
                                <svg width="16" height="16" class="text-warning"><use xlink:href="#star-solid"></use></svg> 4.5
                            </div>
                            <div class="price fw-bold mb-2">$18.00</div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="input-group product-qty" style="width: 120px;">
                                    <button type="button" class="btn btn-danger btn-number" data-type="minus">
                                        <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                                    </button>
                                    <input type="text" class="form-control text-center" value="1">
                                    <button type="button" class="btn btn-success btn-number" data-type="plus">
                                        <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                                    </button>
                                </div>
                                <a href="#" class="btn btn-outline-primary d-flex align-items-center gap-1">
                                    <iconify-icon icon="uil:shopping-cart"></iconify-icon> Add
                                </a>
                            </div>
                        </div>
                    </div>
					 <div class="col">
                        <div class="product-item border rounded p-3 shadow-sm">
                            <a href="#" class="btn-wishlist position-absolute top-0 end-0 m-2">
                                <svg width="24" height="24"><use xlink:href="#heart"></use></svg>
                            </a>
                            <figure class="text-center">
                                <a href="#">
                                    <img src="{{ asset('assetProduct/images/thumb-honey.jpg') }}" class="img-fluid tab-image" alt="Cucumber Juice">
                                </a>
                            </figure>
                            <h5 class="mt-2">Sunstar Fresh Melon Juice</h5>
                            <div class="text-muted small">1 Unit</div>
                            <div class="rating mb-2">
                                <svg width="16" height="16" class="text-warning"><use xlink:href="#star-solid"></use></svg> 4.5
                            </div>
                            <div class="price fw-bold mb-2">$18.00</div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="input-group product-qty" style="width: 120px;">
                                    <button type="button" class="btn btn-danger btn-number" data-type="minus">
                                        <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                                    </button>
                                    <input type="text" class="form-control text-center" value="1">
                                    <button type="button" class="btn btn-success btn-number" data-type="plus">
                                        <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                                    </button>
                                </div>
                                <a href="#" class="btn btn-outline-primary d-flex align-items-center gap-1">
                                    <iconify-icon icon="uil:shopping-cart"></iconify-icon> Add
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

			 {{-- Tab 1 --}}
            <div class="tab-pane fade show active" id="nav-fruits" style="margin-top:50px;" role="tabpanel" aria-labelledby="nav-fruits-tab">
                <div class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
                    <div class="col">
                        <div class="product-item border rounded p-3 shadow-sm">
                            <a href="#" class="btn-wishlist position-absolute top-0 end-0 m-2">
                                <svg width="24" height="24"><use xlink:href="#heart"></use></svg>
                            </a>
                            <figure class="text-center">
                                <a href="#">
                                    <img src="{{ asset('assetProduct/images/thumb-honey.jpg') }}" class="img-fluid tab-image" alt="Cucumber Juice">
                                </a>
                            </figure>
                            <h5 class="mt-2">Sunstar Fresh Melon Juice</h5>
                            <div class="text-muted small">1 Unit</div>
                            <div class="rating mb-2">
                                <svg width="16" height="16" class="text-warning"><use xlink:href="#star-solid"></use></svg> 4.5
                            </div>
                            <div class="price fw-bold mb-2">$18.00</div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="input-group product-qty" style="width: 120px;">
                                    <button type="button" class="btn btn-danger btn-number" data-type="minus">
                                        <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                                    </button>
                                    <input type="text" class="form-control text-center" value="1">
                                    <button type="button" class="btn btn-success btn-number" data-type="plus">
                                        <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                                    </button>
                                </div>
                                <a href="#" class="btn btn-outline-primary d-flex align-items-center gap-1">
                                    <iconify-icon icon="uil:shopping-cart"></iconify-icon> Add
                                </a>
                            </div>
                        </div>
                    </div>
					 <div class="col">
                        <div class="product-item border rounded p-3 shadow-sm">
                            <a href="#" class="btn-wishlist position-absolute top-0 end-0 m-2">
                                <svg width="24" height="24"><use xlink:href="#heart"></use></svg>
                            </a>
                            <figure class="text-center">
                                <a href="#">
                                    <img src="{{ asset('assetProduct/images/thumb-honey.jpg') }}" class="img-fluid tab-image" alt="Cucumber Juice">
                                </a>
                            </figure>
                            <h5 class="mt-2">Sunstar Fresh Melon Juice</h5>
                            <div class="text-muted small">1 Unit</div>
                            <div class="rating mb-2">
                                <svg width="16" height="16" class="text-warning"><use xlink:href="#star-solid"></use></svg> 4.5
                            </div>
                            <div class="price fw-bold mb-2">$18.00</div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="input-group product-qty" style="width: 120px;">
                                    <button type="button" class="btn btn-danger btn-number" data-type="minus">
                                        <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                                    </button>
                                    <input type="text" class="form-control text-center" value="1">
                                    <button type="button" class="btn btn-success btn-number" data-type="plus">
                                        <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                                    </button>
                                </div>
                                <a href="#" class="btn btn-outline-primary d-flex align-items-center gap-1">
                                    <iconify-icon icon="uil:shopping-cart"></iconify-icon> Add
                                </a>
                            </div>
                        </div>
                    </div>
					 <div class="col">
                        <div class="product-item border rounded p-3 shadow-sm">
                            <a href="#" class="btn-wishlist position-absolute top-0 end-0 m-2">
                                <svg width="24" height="24"><use xlink:href="#heart"></use></svg>
                            </a>
                            <figure class="text-center">
                                <a href="#">
                                    <img src="{{ asset('assetProduct/images/thumb-honey.jpg') }}" class="img-fluid tab-image" alt="Cucumber Juice">
                                </a>
                            </figure>
                            <h5 class="mt-2">Sunstar Fresh Melon Juice</h5>
                            <div class="text-muted small">1 Unit</div>
                            <div class="rating mb-2">
                                <svg width="16" height="16" class="text-warning"><use xlink:href="#star-solid"></use></svg> 4.5
                            </div>
                            <div class="price fw-bold mb-2">$18.00</div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="input-group product-qty" style="width: 120px;">
                                    <button type="button" class="btn btn-danger btn-number" data-type="minus">
                                        <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                                    </button>
                                    <input type="text" class="form-control text-center" value="1">
                                    <button type="button" class="btn btn-success btn-number" data-type="plus">
                                        <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                                    </button>
                                </div>
                                <a href="#" class="btn btn-outline-primary d-flex align-items-center gap-1">
                                    <iconify-icon icon="uil:shopping-cart"></iconify-icon> Add
                                </a>
                            </div>
                        </div>
                    </div>
					 <div class="col">
                        <div class="product-item border rounded p-3 shadow-sm">
                            <a href="#" class="btn-wishlist position-absolute top-0 end-0 m-2">
                                <svg width="24" height="24"><use xlink:href="#heart"></use></svg>
                            </a>
                            <figure class="text-center">
                                <a href="#">
                                    <img src="{{ asset('assetProduct/images/thumb-honey.jpg') }}" class="img-fluid tab-image" alt="Cucumber Juice">
                                </a>
                            </figure>
                            <h5 class="mt-2">Sunstar Fresh Melon Juice</h5>
                            <div class="text-muted small">1 Unit</div>
                            <div class="rating mb-2">
                                <svg width="16" height="16" class="text-warning"><use xlink:href="#star-solid"></use></svg> 4.5
                            </div>
                            <div class="price fw-bold mb-2">$18.00</div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="input-group product-qty" style="width: 120px;">
                                    <button type="button" class="btn btn-danger btn-number" data-type="minus">
                                        <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                                    </button>
                                    <input type="text" class="form-control text-center" value="1">
                                    <button type="button" class="btn btn-success btn-number" data-type="plus">
                                        <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                                    </button>
                                </div>
                                <a href="#" class="btn btn-outline-primary d-flex align-items-center gap-1">
                                    <iconify-icon icon="uil:shopping-cart"></iconify-icon> Add
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div> {{-- end tab-content --}}
			<!-- Load more -->
		<div class="flex-c-m flex-w w-full p-t-45">
				<a href="{{route('shop-product')}}" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Load More
				</a>
			</div>
		</div>
	</section>
	<!-- End Product -->
@endsection
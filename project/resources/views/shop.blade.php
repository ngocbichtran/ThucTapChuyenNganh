@extends('layout/shop')
@section('body')

<section class="py-5 bg-white">
    <div class="container-xl">
        <div class="card bg-hero border-0 rounded-5 overflow-hidden position-relative shadow-sm">

            <div class="blur-blob bg-primary opacity-25"
                 style="width:200px;height:200px;top:-50px;left:-50px"></div>

            <img src="{{ asset('assetShop/images/icons/Bannershop2.png') }}"
                 class="img-fluid rounded-4 shadow-sm"
                 alt="Banner">

        </div>
    </div>
</section>

<section class="py-5 bg-white">
    <div class="container">

        <h3 class="fw-bold mb-4">Sản Phẩm Nổi Bật</h3>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            @foreach ($products as $pro)
            <div class="col">
                <div class="product-item border rounded p-3 shadow-sm h-100">

                    <figure class="text-center mb-3">
                        <img src="{{ $pro->IMG_URL }}"
                             class="img-fluid"
                             style="height:200px; object-fit:contain;">
                    </figure>

                    <h6 class="fw-bold">{{ $pro->NAME }}</h6>
                    <div class="text-primary fw-bold mb-2">
                        {{ number_format($pro->PRICE) }} đ
                    </div>

                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
@endsection

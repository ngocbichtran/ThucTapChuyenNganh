@extends('layout.shop')

@section('body')

<div class="container py-5">

    <!-- Header -->
    <div class="text-center mb-5">
        <h2 class="fw-bold">Về Capy Shop</h2>
        <p class="text-muted mt-2">
            Nơi cung cấp sản phẩm điện tử chính hãng – uy tín – giá tốt
        </p>
    </div>

    <!-- Giới thiệu -->
    <div class="row align-items-center mb-5">
        <div class="col-md-6 mb-4 mb-md-0">
            <img src="{{asset('assetShop\images\icons\CabyShopTrang.png')}}"
                 class="img-fluid rounded-4 shadow-sm" width="300"
                 alt="Capy Shop">
        </div>
        <div class="col-md-6">
            <h4 class="fw-bold mb-3">Capy Shop là ai?</h4>
            <p class="text-muted">
                <strong>Capy Shop</strong> là cửa hàng chuyên kinh doanh các sản phẩm điện tử
                như điện thoại, phụ kiện, thiết bị công nghệ với tiêu chí
                <b>chất lượng – minh bạch – khách hàng là trung tâm</b>.
            </p>
            <p class="text-muted">
                Chúng tôi cam kết chỉ cung cấp sản phẩm <b>chính hãng 100%</b>,
                nguồn gốc rõ ràng, giá cả cạnh tranh cùng chế độ bảo hành uy tín.
            </p>
        </div>
    </div>

    <!-- Giá trị cốt lõi -->
    <div class="row text-center mb-5">
        <div class="col-md-4 mb-4">
            <div class="p-4 border rounded-4 h-100">
                <i class="bi bi-shield-check text-primary fs-1 mb-3"></i>
                <h5 class="fw-bold">Chính hãng</h5>
                <p class="text-muted mb-0">
                    Sản phẩm có nguồn gốc rõ ràng, bảo hành đầy đủ.
                </p>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="p-4 border rounded-4 h-100">
                <i class="bi bi-currency-dollar text-success fs-1 mb-3"></i>
                <h5 class="fw-bold">Giá tốt</h5>
                <p class="text-muted mb-0">
                    Giá cả cạnh tranh, nhiều chương trình ưu đãi hấp dẫn.
                </p>
            </div>
        </div>

        <div class="col-md-4 mb-4">
            <div class="p-4 border rounded-4 h-100">
                <i class="bi bi-headset text-warning fs-1 mb-3"></i>
                <h5 class="fw-bold">Hỗ trợ tận tâm</h5>
                <p class="text-muted mb-0">
                    Đội ngũ tư vấn nhiệt tình, hỗ trợ nhanh chóng.
                </p>
            </div>
        </div>
    </div>

    <!-- Tầm nhìn -->
    <div class="bg-light rounded-4 p-5 text-center">
        <h4 class="fw-bold mb-3">Tầm nhìn của Capy Shop</h4>
        <p class="text-muted mb-0">
            Trở thành cửa hàng điện tử đáng tin cậy hàng đầu,
            mang đến trải nghiệm mua sắm công nghệ
            <b>đơn giản – an toàn – hài lòng</b> cho mọi khách hàng.
        </p>
    </div>

</div>

@endsection

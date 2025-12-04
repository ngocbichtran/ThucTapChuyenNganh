@extends('layout/home')
@section('body')
<style>
  /* ========================= */
/* Bố cục thống kê đẹp hơn   */
/* ========================= */

/* Card thống kê riêng */
.stat-card {
    padding-top: 6px;
    padding-bottom: 6px;
}

/* Dòng tiêu đề trong card (title + icon) */
.title-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

/* Chart area rộng bằng card */
.chart-area {
    width: 100%;
    min-height: 260px;
}

/* Cân card đều nhau */
.col-md-4 .soft-card {
    height: 100%;
}

</style>
<div class="row g-4">

    <!-- Hàng 1: 3 thẻ thống kê -->
    <div class="col-md-4">
        <div class="card soft-card stat-card">
            <div class="card-body">
                <div class="title-row">
                    <h6 class="text-muted">Tổng danh mục</h6>
                    <span class="badge pastel-badge bg-light-primary border border-primary">
                        <i class="ti ti-category"></i>
                    </span>
                </div>
                <h3 class="pastel-number">{{ $countCategory ?? 0 }}</h3>
                <a href="{{ route('admin.category.index') }}" class="link-primary-soft">Xem chi tiết →</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card soft-card stat-card">
            <div class="card-body">
                <div class="title-row">
                    <h6 class="text-muted">Tổng sản phẩm</h6>
                    <span class="badge pastel-badge bg-light-success border border-success">
                        <i class="ti ti-package"></i>
                    </span>
                </div>
                <h3 class="pastel-number">{{ $countProduct ?? 0 }}</h3>
                <a href="{{ route('admin.product.index') }}" class="link-success-soft">Xem chi tiết →</a>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card soft-card stat-card">
            <div class="card-body">
                <div class="title-row">
                    <h6 class="text-muted">Tổng người dùng</h6>
                    <span class="badge pastel-badge bg-light-warning border border-warning">
                        <i class="ti ti-users"></i>
                    </span>
                </div>
                <h3 class="pastel-number">{{ $countUser ?? 0 }}</h3>
                <a href="{{ route('admin.user.index') }}" class="link-warning-soft">Xem chi tiết →</a>
            </div>
        </div>
    </div>


    <!-- Hàng 2: Thẻ doanh thu rộng -->
    <div class="col-md-12 mt-3">
        <h5 class="fw-semibold mb-3">Tổng quan doanh thu</h5>

        <div class="card soft-card">
            <div class="card-body">
                <div class="title-row mb-1">
                    <h6 class="text-muted">Tuần này</h6>
                </div>

                <h2 class="fw-bold pastel-number mb-3">
                    {{ number_format($revenueWeek ?? 0, 0, ',', '.') }} đ
                </h2>

                <div id="income-overview-chart" class="chart-area"></div>
            </div>
        </div>
    </div>

</div>


@endsection

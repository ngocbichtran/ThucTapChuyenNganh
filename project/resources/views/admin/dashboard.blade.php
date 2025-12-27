@extends('layout.home')

@section('title','Dashboard')

@section('body')
<style>
    .stat-card {
        background: #fff;
        border-radius: 20px;
        padding: 24px;
        box-shadow: 0 10px 25px rgba(0,0,0,.05);
        transition: all .25s ease;
        position: relative;
        overflow: hidden;
    }

    .stat-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 40px rgba(0,0,0,.08);
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }

    .stat-card h3 {
        font-size: 34px;
        margin-top: 12px;
    }

    .stat-card a {
        font-weight: 500;
    }

    .stat-card::after {
        content: '';
        position: absolute;
        right: -40px;
        bottom: -40px;
        width: 120px;
        height: 120px;
        background: rgba(0,0,0,.03);
        border-radius: 50%;
    }
</style>

<div class="mb-4 d-flex justify-content-between align-items-center">
    <div>
        <h5 class="fw-bold mb-1">Tổng quan kho</h5>
        <small class="text-muted">Thống kê hệ thống</small>
    </div>
    <span class="badge bg-light text-muted px-3 py-2 rounded-pill">
        {{ now()->format('d/m/Y') }}
    </span>
</div>

<div class="row g-4">

    <!-- Danh mục -->
    <div class="col-md-6 col-xl-4">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <span class="text-muted fw-medium">Danh mục</span>
            </div>

            <h3 class="fw-bold">{{ $totalCategories }}</h3>

            <a href="{{ route('admin.category.index') }}"
               class="text-primary text-decoration-none">
                Xem chi tiết →
            </a>
        </div>
    </div>

    <!-- Sản phẩm -->
    <div class="col-md-6 col-xl-4">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <span class="text-muted fw-medium">Sản phẩm</span>
            </div>

            <h3 class="fw-bold">{{ $totalProducts }}</h3>

            <a href="{{ route('admin.product.index') }}"
               class="text-success text-decoration-none">
                Quản lý →
            </a>
        </div>
    </div>

    <!-- Người dùng -->
    <div class="col-md-6 col-xl-4">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center">
                <span class="text-muted fw-medium">Người dùng</span>
            </div>

            <h3 class="fw-bold">{{ $totalUsers }}</h3>

            <a href="{{ route('admin.user.index') }}"
               class="text-warning text-decoration-none">
                Danh sách →
            </a>
        </div>
    </div>

</div>

@endsection

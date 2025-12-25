@extends('layout.home')

@section('title','Dashboard')

@section('body')

<div class="mb-4 d-flex justify-content-between align-items-center">
    <h5 class="fw-bold mb-0">📊 Tổng quan kho</h5>
    <small class="text-muted">Hôm nay</small>
</div>

<div class="row g-4">

    <!-- Tổng danh mục -->
    <div class="col-md-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="text-muted fw-medium">Tổng danh mục</span>
                <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                    <i class="bi bi-tags"></i>
                </div>
            </div>
            <h3 class="fw-bold mb-1">{{ $countCategory ?? 0 }}</h3>
            <small class="text-muted">Đang quản lý</small>
        </div>
    </div>

    <!-- Tổng sản phẩm -->
    <div class="col-md-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="text-muted fw-medium">Tổng sản phẩm</span>
                <div class="stat-icon bg-success bg-opacity-10 text-success">
                    <i class="bi bi-phone"></i>
                </div>
            </div>
            <h3 class="fw-bold mb-1">{{ $countProduct ?? 0 }}</h3>
            <small class="text-muted">Trong kho</small>
        </div>
    </div>

    <!-- Tổng người dùng -->
    <div class="col-md-6 col-xl-3">
        <div class="stat-card">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="text-muted fw-medium">Người dùng</span>
                <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                    <i class="bi bi-people"></i>
                </div>
            </div>
            <h3 class="fw-bold mb-1">{{ $countUser ?? 0 }}</h3>
            <small class="text-muted">Hệ thống</small>
        </div>
    </div>

</div>

@endsection

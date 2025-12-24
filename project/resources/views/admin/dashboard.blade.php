@extends('layout/home')

@section('body')
    <div class="pc-content">

        {{-- Page header --}}
        <div class="page-header mb-4">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h5 class="mb-0">Dashboard</h5>
                    </div>
                    <div class="col-md-6 text-end">
                        <ul class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- Statistic cards --}}
        <div class="row">

            {{-- Tổng danh mục --}}
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted fw-semibold">Tổng danh mục</span>
                            <i class="ti ti-category text-primary fs-4"></i>
                        </div>

                        <h4 class="fw-bold mb-2">
                            {{ $countCategory ?? 0 }}
                        </h4>

                        <a href="{{ route('admin.category.index') }}"
                           class="text-primary small">
                            Xem chi tiết →
                        </a>
                    </div>
                </div>
            </div>

            {{-- Tổng sản phẩm --}}
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted fw-semibold">Tổng sản phẩm</span>
                            <i class="ti ti-package text-success fs-4"></i>
                        </div>

                        <h4 class="fw-bold mb-2">
                            {{ $countProduct ?? 0 }}
                        </h4>

                        <a href="{{ route('admin.product.index') }}"
                           class="text-success small">
                            Xem chi tiết →
                        </a>
                    </div>
                </div>
            </div>

            {{-- Tổng người dùng --}}
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="text-muted fw-semibold">Tổng người dùng</span>
                            <i class="ti ti-users text-warning fs-4"></i>
                        </div>

                        <h4 class="fw-bold mb-2">
                            {{ $countUser ?? 0 }}
                        </h4>

                        <a href="{{ route('admin.user.index') }}"
                           class="text-warning small">
                            Xem chi tiết →
                        </a>
                    </div>
                </div>
            </div>

        </div>
        {{-- End row --}}


</div>
@endsection

@extends('layout/home')
@section('body')

<div class="pc-container">
    <div class="pc-content">

        <!-- breadcrumb -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Dashboard</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- MAIN CONTENT -->
        <div class="row">

            <!-- Tổng danh mục -->
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-2 text-muted">Tổng danh mục</h6>
                        <h4 class="mb-3">
                            {{ $countCategory ?? 0 }}
                            <span class="badge bg-light-primary border border-primary">
                                <i class="ti ti-category"></i>
                            </span>
                        </h4>
                        <a href="{{ route('admin.category.index') }}" class="text-primary">Xem chi tiết</a>
                    </div>
                </div>
            </div>

            <!-- Tổng sản phẩm -->
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-2 text-muted">Tổng sản phẩm</h6>
                        <h4 class="mb-3">
                            {{ $countProduct ?? 0 }}
                            <span class="badge bg-light-success border border-success">
                                <i class="ti ti-package"></i>
                            </span>
                        </h4>
                        <a href="{{ route('admin.product.index') }}" class="text-success">Xem chi tiết</a>
                    </div>
                </div>
            </div>

            <!-- Tổng người dùng -->
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-2 text-muted">Tổng người dùng</h6>
                        <h4 class="mb-3">
                            {{ $countUser ?? 0 }}
                            <span class="badge bg-light-warning border border-warning">
                                <i class="ti ti-users"></i>
                            </span>
                        </h4>
                        <a href="{{ route('admin.user.index') }}" class="text-warning">Xem chi tiết</a>
                    </div>
                </div>
            </div>



        </div> <!-- row -->

    </div>
</div>

@endsection

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
                        <a href="{{ route('admin.users.index') }}" class="text-warning">Xem chi tiết</a>
                    </div>
                </div>
            </div>

            <!-- Tổng đơn hàng -->
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-2 text-muted">Tổng đơn hàng</h6>
                        <h4 class="mb-3">
                            {{ $countOrder ?? 0 }}
                            <span class="badge bg-light-danger border border-danger">
                                <i class="ti ti-shopping-cart"></i>
                            </span>
                        </h4>
                        <a href="{{ route('admin.orders.index') }}" class="text-danger">Xem chi tiết</a>
                    </div>
                </div>
            </div>

            <!-- BẢNG ĐƠN HÀNG GẦN ĐÂY -->
            <div class="col-md-12 col-xl-8 mt-4">
                <h5 class="mb-3">Đơn hàng gần đây</h5>
                <div class="card tbl-card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-borderless mb-0">
                                <thead>
                                    <tr>
                                        <th>Mã đơn</th>
                                        <th>Khách hàng</th>
                                        <th>Ngày</th>
                                        <th>Trạng thái</th>
                                        <th class="text-end">Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse($recentOrders as $order)
                                        <tr>
                                            <td>{{ $order->ID }}</td>
                                            <td>{{ $order->customer_name }}</td>
                                            <td>{{ \Carbon\Carbon::parse($order->created_at)->format('d/m/Y') }}</td>

                                            <td>
                                                @if($order->status == 'PENDING')
                                                    <span class="text-warning"><i class="fas fa-circle f-10"></i> Pending</span>
                                                @elseif($order->status == 'DELIVERED')
                                                    <span class="text-success"><i class="fas fa-circle f-10"></i> Delivered</span>
                                                @else
                                                    <span class="text-danger"><i class="fas fa-circle f-10"></i> Cancel</span>
                                                @endif
                                            </td>

                                            <td class="text-end">{{ number_format($order->total, 0, ',', '.') }} đ</td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="5">Không có dữ liệu</td></tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- BÁO CÁO DOANH THU NHẸ -->
            <div class="col-md-12 col-xl-4 mt-4">
                <h5 class="mb-3">Tổng quan doanh thu</h5>
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-muted mb-2">Tuần này</h6>
                        <h3 class="mb-3">{{ number_format($revenueWeek ?? 0, 0, ',', '.') }} đ</h3>
                        <div id="income-overview-chart"></div>
                    </div>
                </div>
            </div>

        </div> <!-- row -->

    </div>
</div>

@endsection

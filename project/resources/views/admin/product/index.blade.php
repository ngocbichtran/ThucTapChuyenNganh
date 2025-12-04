@extends('layout/home')

@section('body')

<style>
    /* ==== TABLE FIX SIZE ==== */
    .fixed-table {
        table-layout: fixed;
        width: 100%;
    }
    .fixed-table th,
    .fixed-table td {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .col-name { width: 150px; }
    .col-desc { width: 300px; white-space: normal !important; text-overflow: unset !important; }
    .col-img  { width: 120px; }
    .col-status { width: 100px; }
    .col-date { width: 130px; }
    .col-action { width: 160px; }

    /* ==== PAGINATION CUSTOM ==== */
    .pagination { gap: 6px; }
    .pagination .page-item .page-link {
        border-radius: 8px !important;
        padding: 8px 14px;
        border: 1px solid #d0d7e2;
        color: #4a6fa5;
        background: #f8fbff;
        transition: 0.25s;
        font-weight: 500;
    }
    .pagination .page-item .page-link:hover {
        background: #e3ecf7;
        color: #2f4d6b;
    }
    .pagination .page-item.active .page-link {
        background: #4a6fa5 !important;
        border-color: #4a6fa5 !important;
        color: #fff !important;
        box-shadow: 0 0 6px rgba(74,111,165,0.4);
    }
    .pagination .page-item.disabled .page-link {
        background: #f0f4f9;
        color: #a0aec0;
    }
</style>

<div class="container">

    <!-- Header: Add - Filter - Search -->
    <div class="d-flex justify-content-between align-items-center mb-3">

        <!-- Nút thêm -->
        <a href="{{ route('admin.product.create') }}"
           class="btn btn-success shadow-sm px-3 py-2">
            <i class="fa fa-plus me-1"></i> Add
        </a>

        <!-- Filter -->
        <div class="d-flex">

            <a href="{{ route('admin.product.index', ['status' => 'all']) }}"
               class="btn btn-outline-secondary me-2 {{ $status == 'all' ? 'active' : '' }}">
                Tất cả ({{ $count['all'] }})
            </a>

            <a href="{{ route('admin.product.index', ['status' => 'active']) }}"
               class="btn btn-outline-success me-2 {{ $status == 'active' ? 'active' : '' }}">
                Đang bán ({{ $count['active'] }})
            </a>

            <a href="{{ route('admin.product.index', ['status' => 'inactive']) }}"
               class="btn btn-outline-warning me-2 {{ $status == 'inactive' ? 'active' : '' }}">
                Chưa bán ({{ $count['inactive'] }})
            </a>

            <a href="{{ route('admin.product.index', ['status' => 'trash']) }}"
               class="btn btn-outline-danger {{ $status == 'trash' ? 'active' : '' }}">
                Thùng rác ({{ $count['trash'] }})
            </a>

        </div>

        <!-- Search -->
        <form method="GET" action="{{ route('admin.product.index') }}" class="d-flex">
            <input type="text" name="keyword" value="{{ $keyword ?? '' }}"
                   class="form-control" placeholder="Tìm kiếm sản phẩm..." style="width: 230px;">
            <button class="btn btn-primary ms-2">Tìm</button>
        </form>

    </div>

    <!-- Thông báo -->
    @if($keyword && $products->total() == 0)
        <div class="alert alert-warning py-2">
            Không tìm thấy kết quả cho từ khóa: <strong>{{ $keyword }}</strong>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger py-2">{{ session('error') }}</div>
    @endif

    @if (session('success'))
        <div class="alert alert-success py-2">{{ session('success') }}</div>
    @endif


    <!-- Bảng sản phẩm -->
    <div class="card shadow-lg border-0">
        <div class="card-body p-0">

            <div class="table-responsive" style="min-height:400px;">
                <table class="table table-bordered border-secondary table-hover text-center align-middle m-0 fixed-table">

                    <thead class="text-white" style="background: #4a6fa5;">
                        <tr>
                            <th style="width: 18%;">Tên sản phẩm</th>
                            <th style="width: 20%;">Mô tả</th>
                            <th style="width: 13%;">Đơn giá</th>
                            <th style="width: 12%;">Ảnh</th>
                            <th style="width: 10%;">Trạng thái</th>
                            <th style="width: 13%;">Ngày Tạo</th>
                            <th style="width: 17%;">Hành Động</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($products as $product)
                        <tr>

                            <td class="truncate">{{ $product->NAME }}</td>

                            <td class="text-start truncate col-desc">
                                {{ $product->DESCRIPTION }}
                            </td>

                            <td class="text-start truncate col-desc">
                                {{ $product->PRICE }}
                            </td>

                            <td>
                                <img src="{{ asset($product->IMG_URL) }}"
                                     alt="{{ $product->NAME }}"
                                     class="rounded shadow-sm"
                                     style="width: 80px; height: auto;">
                            </td>

                            <td>
                                @if($product->ACTIVE_FLAG == 1)
                                    <span class="badge bg-success p-2">
                                        <i class="bi bi-bag-check fs-5"></i>
                                    </span>
                                @else
                                    <span class="badge bg-secondary p-2">
                                        <i class="bi bi-bag-x fs-5"></i>
                                    </span>
                                @endif
                            </td>

                            <td>
                                {{ $product->CREATE_DATE
                                    ? \Carbon\Carbon::parse($product->CREATE_DATE)->format('d/m/Y')
                                    : '-' }}
                            </td>

                            <td>
                                <a href="{{ route('admin.product.edit', $product->ID) }}"
                                   class="btn btn-primary btn-sm me-1">
                                    Edit
                                </a>

                                <form action="{{ route('admin.product.destroy', $product->ID) }}"
                                      method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                            onclick="return confirm('Bạn có chắc muốn xóa?')">
                                        Delete
                                    </button>
                                </form>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>

    <!-- Phân trang -->
    <div class="d-flex justify-content-center mt-3">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>

</div>

@endsection

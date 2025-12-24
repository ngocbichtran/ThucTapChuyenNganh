@extends('layout/home')

@section('body')

<style>
    .table td, .table th {
        vertical-align: middle;
    }
    .truncate {
        max-width: 280px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>

<div class="container-fluid px-4">

    {{-- ===== HEADER ===== --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-primary mb-0">Quản lý sản phẩm</h4>

        <a href="{{ route('admin.product.create') }}"
           class="btn btn-success shadow-sm">
            <i class="fa fa-plus me-1"></i> Thêm sản phẩm
        </a>
    </div>

    {{-- ===== FILTER + SEARCH ===== --}}
    <div class="card mb-3 shadow-sm">
        <div class="card-body py-3">
            <div class="row align-items-center g-2">

                {{-- Filter --}}
                <div class="col-md-8">
                    <div class="btn-group" role="group">
                        <a href="{{ route('admin.product.index',['status'=>'all']) }}"
                           class="btn btn-outline-secondary {{ $status=='all'?'active':'' }}">
                            Tất cả ({{ $count['all'] }})
                        </a>

                        <a href="{{ route('admin.product.index',['status'=>'active']) }}"
                           class="btn btn-outline-success {{ $status=='active'?'active':'' }}">
                            Đang bán ({{ $count['active'] }})
                        </a>

                        <a href="{{ route('admin.product.index',['status'=>'inactive']) }}"
                           class="btn btn-outline-warning {{ $status=='inactive'?'active':'' }}">
                            Chưa bán ({{ $count['inactive'] }})
                        </a>

                        <a href="{{ route('admin.product.index',['status'=>'trash']) }}"
                           class="btn btn-outline-danger {{ $status=='trash'?'active':'' }}">
                            Thùng rác ({{ $count['trash'] }})
                        </a>
                    </div>
                </div>

                {{-- Search --}}
                <div class="col-md-4">
                    <form method="GET" class="d-flex">
                        <input type="hidden" name="status" value="{{ $status }}">
                        <input type="text"
                               name="keyword"
                               class="form-control"
                               placeholder="Tìm sản phẩm..."
                               value="{{ $keyword ?? '' }}">
                        <button class="btn btn-primary ms-2">
                            <i class="fa fa-search"></i>
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    {{-- ===== ALERT ===== --}}
    @if($keyword && $products->total() == 0)
        <div class="alert alert-warning py-2">
            Không tìm thấy kết quả cho từ khóa: <strong>{{ $keyword }}</strong>
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success py-2">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger py-2">{{ session('error') }}</div>
    @endif

    {{-- ===== TABLE ===== --}}
    <div class="card shadow-sm">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle text-center mb-0">

                    <thead class="table-light">
                        <tr>
                            <th>Tên sản phẩm</th>
                            <th>Mô tả</th>
                            <th>Giá</th>
                            <th>Ảnh</th>
                            <th>Trạng thái</th>
                            <th>Ngày tạo</th>
                            <th width="160">Hành động</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($products as $product)
                        <tr>

                            <td class="fw-semibold">
                                {{ $product->NAME }}
                            </td>

                            <td class="text-start text-muted truncate">
                                {{ $product->DESCRIPTION }}
                            </td>

                            <td class="text-end fw-bold">
                                {{ number_format($product->PRICE) }} đ
                            </td>

                            <td>
                                <img src="{{ asset($product->IMG_URL) }}"
                                     alt="{{ $product->NAME }}"
                                     class="rounded shadow-sm"
                                     width="70">
                            </td>

                            <td>
                                @if($product->ACTIVE_FLAG)
                                    <span class="badge bg-success">Đang bán</span>
                                @else
                                    <span class="badge bg-secondary">Chưa bán</span>
                                @endif
                            </td>

                            <td>
                                {{ $product->CREATE_DATE
                                    ? \Carbon\Carbon::parse($product->CREATE_DATE)->format('d/m/Y')
                                    : '-' }}
                            </td>

                            <td>
                                @if($status !== 'trash')
                                    <a href="{{ route('admin.product.edit',$product->ID) }}"
                                       class="btn btn-sm btn-outline-primary">
                                        Sửa
                                    </a>

                                    <form action="{{ route('admin.product.destroy',$product->ID) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Bạn chắc chắn muốn xóa?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">
                                            Xóa
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.product.restore',$product->ID) }}"
                                          method="POST"
                                          class="d-inline">
                                        @csrf
                                        <button class="btn btn-sm btn-outline-success">
                                            Khôi phục
                                        </button>
                                    </form>
                                @endif
                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>

    {{-- ===== PAGINATION ===== --}}
    <div class="d-flex justify-content-center mt-4">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection

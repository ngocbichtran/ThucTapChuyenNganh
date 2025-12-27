@extends('layout/home')
@section('body')

<style>
    .table td, .table th {
        vertical-align: middle;
    }

    .truncate {
        max-width: 260px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .badge-soft-success {
        background: rgba(25,135,84,.15);
        color: #198754;
    }

    .badge-soft-secondary {
        background: rgba(108,117,125,.15);
        color: #6c757d;
    }

    .badge-soft-danger {
        background: rgba(220,53,69,.15);
        color: #dc3545;
    }

    .filter-btns .btn {
        border-radius: 999px;
        padding: 6px 16px;
    }
</style>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h5 class="fw-bold mb-1">Quản lý sản phẩm</h5>
        <ol class="breadcrumb mb-0 small">
            <li class="breadcrumb-item">Sản phẩm</li>
            <li class="breadcrumb-item active">Danh sách</li>
        </ol>
    </div>
    @if($keyword && $products->total()==0)
        <div class="alert alert-warning rounded-3">
            Không tìm thấy kết quả cho: <strong>{{ $keyword }}</strong>
        </div>
    @endif

    @foreach(['success','error'] as $msg)
        @if(session($msg))
            <div class="alert alert-{{ $msg=='success'?'success':'danger' }} rounded-3">
                {{ session($msg) }}
            </div>
        @endif
    @endforeach
    <a href="{{ route('admin.product.create') }}"
       class="btn btn-primary rounded-pill px-4">
        <i class="bi bi-plus-lg"></i> Thêm sản phẩm
    </a>
</div>

<div class="card border-0 shadow-sm rounded-4 mb-4">
    <div class="card-body d-flex flex-wrap justify-content-between align-items-center gap-3">

        <div class="filter-btns btn-group">
            <a href="{{ route('admin.product.index',['status'=>'all']) }}"
               class="btn btn-outline-primary {{ $status=='all'?'active':'' }}">
                Tất cả ({{ $count['all'] }})
            </a>

            <a href="{{ route('admin.product.index',['status'=>'active']) }}"
               class="btn btn-outline-success {{ $status=='active'?'active':'' }}">
                Đang bán ({{ $count['active'] }})
            </a>

            <a href="{{ route('admin.product.index',['status'=>'inactive']) }}"
               class="btn btn-outline-secondary {{ $status=='inactive'?'active':'' }}">
                Chưa bán ({{ $count['inactive'] }})
            </a>

            <a href="{{ route('admin.product.index',['status'=>'trash']) }}"
               class="btn btn-outline-danger {{ $status=='trash'?'active':'' }}">
                Thùng rác ({{ $count['trash'] }})
            </a>
        </div>

        <form method="GET" action="{{ route('admin.product.index') }}" class="d-flex">
            <input type="hidden" name="status" value="{{ $status }}">
            <input type="text"
                   name="keyword"
                   value="{{ $keyword ?? '' }}"
                   class="form-control rounded-pill"
                   placeholder="Tìm sản phẩm..."
                   style="width:240px;">
            <button class="btn btn-primary rounded-pill ms-2 px-4">
                Tìm
            </button>
        </form>

    </div>
</div>



<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-center">
                    <tr>
                        <th width="4%">STT</th>
                        <th width="20%">Tên sản phẩm</th>
                        <th width="25%">Mô tả</th>
                        <th width="12%">Giá</th>
                        <th width="7%">Ảnh</th>
                        <th width="9%">Trạng thái</th>
                        <th width="8%">Ngày tạo</th>
                        <th width="15%">Hành động</th>
                    </tr>
                </thead>

                <tbody class="text-center">
                    @php
                        $i = ($products->currentPage()-1)*$products->perPage()+1;
                    @endphp

                    @forelse($products as $product)
                        <tr>
                            <td>{{ $i++ }}</td>

                            <td class="fw-semibold">{{ $product->NAME }}</td>

                            <td class="text-start text-muted truncate">
                                {{ $product->DESCRIPTION ?? '-' }}
                            </td>

                            <td class="text-end">
                                {{ number_format($product->PRICE) }} đ
                            </td>

                            <td>
                                <img src="{{ asset($product->IMG_URL) }}"
                                     width="55"
                                     class="rounded">
                            </td>

                            <td>
                                @if($status=='trash')
                                    <span class="badge badge-soft-danger">Đã xóa</span>
                                @else
                                    <span class="badge {{ $product->ACTIVE_FLAG ? 'badge-soft-success' : 'badge-soft-secondary' }}">
                                        {{ $product->ACTIVE_FLAG ? 'Đang bán' : 'Chưa bán' }}
                                    </span>
                                @endif
                            </td>

                            <td>
                                {{ $product->CREATE_DATE
                                    ? \Carbon\Carbon::parse($product->CREATE_DATE)->format('d/m/Y')
                                    : '-' }}
                            </td>

                            <td>
                                @if($status!='trash')
                                    <a href="{{ route('admin.product.edit',$product->ID) }}"
                                       class="btn btn-sm btn-outline-primary rounded-pill px-3 me-1">
                                        Sửa
                                    </a>

                                    <form action="{{ route('admin.product.destroy',$product->ID) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Xóa sản phẩm này?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger rounded-pill px-3">
                                            Xóa
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.product.restore',$product->ID) }}"
                                          method="POST"
                                          class="d-inline">
                                        @csrf
                                        <button class="btn btn-sm btn-outline-success rounded-pill px-3">
                                            Khôi phục
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-muted py-4">
                                Không có dữ liệu
                            </td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center mt-4">
    {{ $products->links('pagination::bootstrap-5') }}
</div>

@endsection

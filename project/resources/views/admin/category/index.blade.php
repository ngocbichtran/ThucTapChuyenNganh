@extends('layout/home')
@section('body')

<style>
    .table td {
        vertical-align: middle;
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
        <h5 class="fw-bold mb-1">Quản lý danh mục</h5>
        <ol class="breadcrumb mb-0 small">
            <li class="breadcrumb-item">Sản phẩm</li>
            <li class="breadcrumb-item active">Danh mục</li>
        </ol>
    </div>

    <a href="{{ route('admin.category.create') }}"
       class="btn btn-primary rounded-pill px-4">
        <i class="bi bi-plus-lg"></i> Thêm danh mục
    </a>
</div>

<div class="card border-0 shadow-sm rounded-4 mb-4">
    <div class="card-body d-flex flex-wrap justify-content-between align-items-center gap-3">
        <div class="filter-btns btn-group">
           <a href="{{ route('admin.category.index',['status'=>'all']) }}"
            class="btn btn-outline-primary {{ ($status ?? 'all') == 'all' ? 'active' : '' }}">
                Tất cả ({{ $count['all'] }})
            </a>


            <a href="{{ route('admin.category.index',['status'=>'active']) }}"
               class="btn btn-outline-success {{ $status=='active'?'active':'' }}">
                Đang bán ({{ $count['active'] }})
            </a>

            <a href="{{ route('admin.category.index',['status'=>'inactive']) }}"
               class="btn btn-outline-secondary {{ $status=='inactive'?'active':'' }}">
                Chưa bán ({{ $count['inactive'] }})
            </a>

            <a href="{{ route('admin.category.index',['status'=>'trash']) }}"
               class="btn btn-outline-danger {{ $status=='trash'?'active':'' }}">
                Thùng rác ({{ $count['trash'] }})
            </a>
        </div>

        <form method="GET"
              action="{{ route('admin.category.index') }}"
              class="d-flex align-items-center">
            <input type="hidden" name="status" value="{{ $status }}">

            <input type="text"
                   name="keyword"
                   value="{{ $keyword ?? '' }}"
                   class="form-control rounded-pill"
                   placeholder="Tìm danh mục..."
                   style="width:240px;">

            <button class="btn btn-primary rounded-pill ms-2 px-4">
                <i class="bi bi-search"></i> Tìm
            </button>
        </form>

    </div>
</div>


@if($keyword && $categories->total()==0)
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

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-center">
                    <tr>
                        <th width="5%">#</th>
                        <th width="18%">Tên loại</th>
                        <th class="text-start">Mô tả</th>
                        <th width="12%">Trạng thái</th>
                        <th width="12%">Ngày tạo</th>
                        <th width="18%">Hành động</th>
                    </tr>
                </thead>

                <tbody class="text-center">
                    @php
                        $i = ($categories->currentPage()-1)*$categories->perPage()+1;
                    @endphp

                    @forelse($categories as $category)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td class="fw-semibold">{{ $category->TYPE }}</td>
                            <td class="text-start text-muted">
                                {{ $category->DESCRIPTION ?? '-' }}
                            </td>

                            <td>
                                @if($status=='trash')
                                    <span class="badge badge-soft-danger">Đã xóa</span>
                                @else
                                    <span class="badge {{ $category->ACTIVE_FLAG ? 'badge-soft-success' : 'badge-soft-secondary' }}">
                                        {{ $category->ACTIVE_FLAG ? 'Đang bán' : 'Chưa bán' }}
                                    </span>
                                @endif
                            </td>

                            <td>
                                {{ $category->CREATE_DATE
                                    ? \Carbon\Carbon::parse($category->CREATE_DATE)->format('d/m/Y')
                                    : '-' }}
                            </td>

                            <td>
                                @if($status!='trash')
                                    <a href="{{ route('admin.category.edit',$category->ID) }}"
                                       class="btn btn-sm btn-outline-primary rounded-pill px-3 me-1">
                                        Sửa
                                    </a>

                                    <form action="{{ route('admin.category.destroy',$category->ID) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Xóa danh mục này?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger rounded-pill px-3">
                                            Xóa
                                        </button>
                                    </form>
                                @else
                                    <form action="{{ route('admin.category.restore',$category->ID) }}"
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
                            <td colspan="6" class="text-muted py-4">
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
    {{ $categories->links('pagination::bootstrap-5') }}
</div>

@endsection

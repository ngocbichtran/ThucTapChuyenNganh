@extends('layout/home')
@section('body')

<style>
    .fixed-row td {
        height: 60px;
        vertical-align: middle;
        overflow: hidden;
        word-break: break-word;
    }
</style>

<div class="row">
    <div class="col-12">

        {{-- Page header --}}
        <div class="page-header mb-4">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h5 class="mb-0">Quản lý danh mục</h5>
                    </div>
                    <div class="col-md-6 text-end">
                        <ul class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="#">Sản phẩm</a>
                            </li>
                            <li class="breadcrumb-item active">Danh mục</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- Filter + Search --}}
        <div class="card mb-3">
            <div class="card-body d-flex flex-wrap justify-content-between gap-3">

                {{-- Filter trạng thái --}}
                <div class="btn-group">
                    <a href="{{ route('admin.category.index', ['status' => 'all']) }}"
                       class="btn btn-outline-primary {{ $status == 'all' ? 'active' : '' }}">
                        Tất cả ({{ $count['all'] }})
                    </a>

                    <a href="{{ route('admin.category.index', ['status' => 'active']) }}"
                       class="btn btn-outline-primary {{ $status == 'active' ? 'active' : '' }}">
                        Đang bán ({{ $count['active'] }})
                    </a>

                    <a href="{{ route('admin.category.index', ['status' => 'inactive']) }}"
                       class="btn btn-outline-primary {{ $status == 'inactive' ? 'active' : '' }}">
                        Chưa bán ({{ $count['inactive'] }})
                    </a>

                    <a href="{{ route('admin.category.index', ['status' => 'trash']) }}"
                       class="btn btn-outline-danger {{ $status == 'trash' ? 'active' : '' }}">
                        Thùng rác ({{ $count['trash'] }})
                    </a>
                </div>

                {{-- Search --}}
                <form method="GET"
                      action="{{ route('admin.category.index') }}"
                      class="d-flex">
                    <input type="text"
                           name="keyword"
                           value="{{ $keyword ?? '' }}"
                           class="form-control"
                           placeholder="Tìm kiếm..."
                           style="width:220px;">
                    <button class="btn btn-primary ms-2">Tìm</button>
                </form>
            </div>
        </div>

        {{-- Add + Alert --}}
        <div class="d-flex justify-content-between align-items-start mb-3">
            <a href="{{ route('admin.category.create') }}"
               class="btn btn-success">
                <i class="ti ti-plus"></i> Thêm danh mục
            </a>

            <div style="width:60%;">
                @if($keyword && $categories->total() == 0)
                    <div class="alert alert-warning py-2">
                        Không tìm thấy: <strong>{{ $keyword }}</strong>
                    </div>
                @endif

                @foreach (['success','error'] as $msg)
                    @if(session($msg))
                        <div class="alert alert-{{ $msg == 'success' ? 'success' : 'danger' }} py-2">
                            {{ session($msg) }}
                        </div>
                    @endif
                @endforeach

                @if ($errors->any())
                    <div class="alert alert-danger py-2">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>

        {{-- Table --}}
        <div class="card">
            <div class="card-body p-0">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center align-middle m-0 fixed-row">
                        <thead style="background:#e8efff;">
                            <tr>
                                <th width="5%">STT</th>
                                <th width="15%">Tên loại</th>
                                <th>Mô tả</th>
                                <th width="10%">Trạng thái</th>
                                <th width="12%">Ngày tạo</th>
                                <th width="18%">Hành động</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php $i = ($categories->currentPage() - 1) * $categories->perPage() + 1; @endphp
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $category->TYPE }}</td>
                                    <td class="text-start">{{ $category->DESCRIPTION }}</td>
                                    <td>
                                        <span class="badge {{ $category->ACTIVE_FLAG ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $category->ACTIVE_FLAG ? 'Đang bán' : 'Chưa bán' }}
                                        </span>
                                    </td>
                                    <td>
                                        {{ $category->CREATE_DATE
                                            ? \Carbon\Carbon::parse($category->CREATE_DATE)->format('d/m/Y')
                                            : '-' }}
                                    </td>
                                    <td>
                                        @if ($status !== 'trash')
                                            <a href="{{ route('admin.category.edit', $category->ID) }}"
                                               class="btn btn-sm btn-outline-primary me-1">
                                                Sửa
                                            </a>

                                            <form action="{{ route('admin.category.destroy', $category->ID) }}"
                                                  method="POST"
                                                  class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-outline-warning">
                                                    Xóa
                                                </button>
                                            </form>
                                        @else
                                            <form action="{{ route('admin.category.restore', $category->ID) }}"
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

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-3">
            {{ $categories->links('pagination::bootstrap-5') }}
        </div>

    </div>
</div>

@endsection

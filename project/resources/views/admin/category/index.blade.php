@extends('layout/home')
@section('body')

<style>
    .fixed-row td {
        height: 60px;
        max-height: 60px;
        vertical-align: middle;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: normal;
    }
</style>

<div class="container">

    <!-- Thanh chức năng -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="page-title">Quản lý danh mục</h3>

        <!-- Bộ lọc trạng thái -->
        <div class="d-flex">
            <a href="{{ route('admin.category.index', ['status' => 'all']) }}"
               class="btn btn-outline-primary me-1 {{ $status == 'all' ? 'active' : '' }}">
                Tất cả ({{ $count['all'] }})
            </a>

            <a href="{{ route('admin.category.index', ['status' => 'active']) }}"
               class="btn btn-outline-primary me-1 {{ $status == 'active' ? 'active' : '' }}">
                Đang bán ({{ $count['active'] }})
            </a>

            <a href="{{ route('admin.category.index', ['status' => 'inactive']) }}"
               class="btn btn-outline-primary me-1 {{ $status == 'inactive' ? 'active' : '' }}">
                Chưa bán ({{ $count['inactive'] }})
            </a>

            <a href="{{ route('admin.category.index', ['status' => 'trash']) }}"
               class="btn btn-outline-danger {{ $status == 'trash' ? 'active' : '' }}">
                Thùng rác ({{ $count['trash'] }})
            </a>
        </div>

        <!-- Tìm kiếm -->
        <form method="GET" action="{{ route('admin.category.index') }}" class="d-flex">
            <input type="text" name="keyword" value="{{ $keyword ?? '' }}"
                   class="form-control" placeholder="Tìm kiếm..." style="width:200px;">
            <button class="btn btn-primary ms-2">Tìm</button>
        </form>
    </div>


    <!-- Nút Add + Thông báo -->
    <div class="d-flex justify-content-between align-items-start mb-3">

        <a href="{{ route('admin.category.create') }}" class="btn btn-success">
            <i class="fa fa-plus"></i> Add
        </a>

        <div style="width: 60%;">
            @if($keyword && $categories->total() == 0)
                <div class="alert alert-warning py-2">Không tìm thấy: <strong>{{ $keyword }}</strong></div>
            @endif

            @if(session('success'))
                <div class="alert alert-success py-2">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger py-2">{{ session('error') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger py-2">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>


    <!-- Bảng -->
    <div class="card shadow-lg border-0">
        <div class="card-body p-0">

            <div class="table-wrapper" style="min-height:360px;">

                <table class="table table-bordered table-hover text-center align-middle m-0 fixed-row"
                       style="table-layout: fixed; border: 1px solid #cccccc;">
                    
                    <thead class="text-dark" style="background:#e8efff;">
                        <tr>
                            <th style="width: 7%;">STT</th>
                            <th style="width: 20%;">Tên Loại</th>
                            <th style="width: 43%;">Mô tả</th>
                            <th style="width: 12%;">Trạng Thái</th>
                            <th style="width: 12%;">Ngày Tạo</th>
                            <th style="width: 20%;">Hành Động</th>
                        </tr>
                    </thead>

                    <tbody>
                        @php $i=1; @endphp
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $i++ }}</td>

                            <td>{{ $category->TYPE }}</td>

                            <td class="text-start" style="word-break: break-word;">
                                {{ $category->DESCRIPTION }}
                            </td>

                            <td>
                                @if($category->ACTIVE_FLAG == 1)
                                    <span class="badge bg-success">Đang bán</span>
                                @else
                                    <span class="badge bg-secondary">Chưa bán</span>
                                @endif
                            </td>

                            <td>
                                {{ $category->CREATE_DATE
                                    ? \Carbon\Carbon::parse($category->CREATE_DATE)->format('d/m/Y')
                                    : '-' }}
                            </td>

                            <td>
                                <div class="d-flex justify-content-center gap-2">

                                    <a href="{{ route('admin.category.edit', $category->ID) }}"
                                       class="btn btn-primary btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.category.destroy', $category->ID) }}"
                                          method="POST"
                                          onsubmit="return confirm('Bạn có chắc muốn xóa?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="btn btn-danger btn-sm">
                                            Delete
                                        </button>
                                    </form>

                                </div>
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
        {{ $categories->links('pagination::bootstrap-5') }}
    </div>

</div>

@endsection

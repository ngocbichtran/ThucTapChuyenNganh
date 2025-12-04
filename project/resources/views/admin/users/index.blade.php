@extends('layout/home')
@section('body')

<div class="container py-3">

    <!-- Thanh chức năng -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3 class="page-title">Quản lý người dùng</h3>

        <!-- Bộ lọc trạng thái -->
        <div class="d-flex">

            <!-- Tất cả -->
            <a href="{{ route('admin.user.index', ['status' => 'all']) }}"
               class="btn btn-outline-primary me-2 {{ $status == 'all' ? 'active' : '' }}">
                <i class="bi bi-people me-1"></i>
                Tất cả ({{ $count['all'] }})
            </a>

            <!-- Đang hoạt động -->
            <a href="{{ route('admin.user.index', ['status' => 'active']) }}"
               class="btn btn-outline-success me-2 {{ $status == 'active' ? 'active' : '' }}">
                <i class="bi bi-person-check me-1"></i>
                Đang hoạt động ({{ $count['active'] }})
            </a>

            <!-- Ngưng hoạt động -->
            <a href="{{ route('admin.user.index', ['status' => 'trash']) }}"
            class="btn btn-outline-secondary me-2 {{ $status == 'trash' ? 'active' : '' }}">
                <i class="bi bi-trash3 me-1"></i>
                Vô hiệu hóa ({{ $count['trash'] }})
            </a>

        </div>

        <!-- Tìm kiếm -->
        <form method="GET" action="{{ route('admin.user.index') }}" class="d-flex">
            <input type="text" name="keyword" value="{{ $keyword ?? '' }}"
                   class="form-control" placeholder="Tìm kiếm người dùng..." style="width: 220px;">
            <button class="btn btn-primary ms-2">Tìm</button>
        </form>
    </div>

    <!-- Add + Thông báo -->
    <div class="d-flex justify-content-between align-items-center mb-3">

        <a href="{{ route('admin.user.create') }}" class="btn btn-success px-3">
            <i class="fa fa-plus me-1"></i> Add
        </a>

        <div style="width: 60%;">

            @if($keyword && $users->total() == 0)
                <div class="alert alert-warning py-2">
                    Không tìm thấy kết quả cho từ khóa: <strong>{{ $keyword }}</strong>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success py-2">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger py-2">{{ session('error') }}</div>
            @endif

        </div>
    </div>

    <!-- Bảng -->
    <div class="card shadow-lg border-0">
        <div class="card-body p-0">

            <div class="table-responsive">

                <table class="table table-bordered table-hover text-center align-middle m-0"
                       style="table-layout: fixed; border: 1px solid #d5d5d5;">

                    <thead class="text-dark" style="background:#e8efff;">
                        <tr>
                            <th style="width: 6%;">ID</th>
                            <th style="width: 20%;">Tên đăng nhập</th>
                            <th style="width: 30%;">Email</th>
                            <th style="width: 15%;">Quyền hạn</th>
                            <th style="width: 15%;">Ngày tạo</th>
                            <th style="width: 14%;">Hành động</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->ID }}</td>

                            <td>{{ $user->USER_NAME }}</td>

                            <td style="word-break: break-all;">{{ $user->EMAIL }}</td>

                            <td>
                                @if($user->ACTIVE_FLAG == 1)
                                    <span class="badge bg-success">Quyền Admin</span>
                                @else
                                    <span class="badge bg-secondary">Quyền Thường</span>
                                @endif
                            </td>

                            <td>
                                {{ $user->CREATE_DATE 
                                    ? \Carbon\Carbon::parse($user->CREATE_DATE)->format('d/m/Y')
                                    : '-' }}
                            </td>

                            <td>
                                <div class="d-flex justify-content-center gap-2">

                                    @if ($status !== 'trash')
                                        <form action="{{ route('admin.user.destroy', $user->ID) }}"
                                            method="POST"
                                            onsubmit="return confirm('Bạn có chắc muốn vô hiệu hóa user này?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-warning btn-sm">Vô hiệu hóa</button>
                                        </form>

                                    @else
                                        <form action="{{ route('admin.user.restore', $user->ID) }}"
                                            method="POST"
                                            onsubmit="return confirm('Khôi phục người dùng này?')"
                                            style="display:inline-block">
                                            @csrf
                                            <button class="btn btn-success btn-sm">Khôi phục</button>
                                        </form>
                                    @endif

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
        {{ $users->links('pagination::bootstrap-5') }}
    </div>

</div>

@endsection

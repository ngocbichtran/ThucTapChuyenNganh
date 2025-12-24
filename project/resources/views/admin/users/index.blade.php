@extends('layout/home')

@section('body')
<div class="row">
    <div class="col-12">

        {{-- Page header --}}
        <div class="page-header mb-4">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h5 class="mb-0">Quản lý người dùng</h5>
                    </div>
                    <div class="col-md-6 text-end">
                        <a href="{{ route('admin.user.create') }}"
                           class="btn btn-success">
                            <i class="fa fa-plus me-1"></i> Thêm user
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Tabs + Search --}}
        <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">

            {{-- Tabs --}}
            <ul class="nav nav-pills gap-2">
                <li class="nav-item">
                    <a class="nav-link {{ $status == 'all' ? 'active' : '' }}"
                       href="{{ route('admin.user.index', ['status' => 'all']) }}">
                        Tất cả ({{ $count['all'] }})
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $status == 'admin' ? 'active' : '' }}"
                       href="{{ route('admin.user.index', ['status' => 'admin']) }}">
                        Admin ({{ $count['admin'] }})
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $status == 'user' ? 'active' : '' }}"
                       href="{{ route('admin.user.index', ['status' => 'user']) }}">
                        User ({{ $count['user'] }})
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ $status == 'trash' ? 'active' : '' }}"
                       href="{{ route('admin.user.index', ['status' => 'trash']) }}">
                        Vô hiệu hóa ({{ $count['trash'] }})
                    </a>
                </li>
            </ul>

            {{-- Search --}}
            <form method="GET"
                  action="{{ route('admin.user.index') }}"
                  class="d-flex">
                <input type="text"
                       name="keyword"
                       value="{{ $keyword ?? '' }}"
                       class="form-control"
                       placeholder="Tìm user..."
                       style="width:220px">
                <button class="btn btn-primary ms-2">Tìm</button>
            </form>
        </div>

        {{-- Alert --}}
        @if (session('success'))
            <div class="alert alert-success py-2">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger py-2">
                {{ session('error') }}
            </div>
        @endif

        @if($keyword && $users->total() == 0)
            <div class="alert alert-warning py-2">
                Không tìm thấy kết quả cho: <strong>{{ $keyword }}</strong>
            </div>
        @endif

        {{-- Card table --}}
        <div class="card">
            <div class="table-responsive">
                <table class="table table-hover align-middle text-center mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>ID</th>
                            <th>Tên đăng nhập</th>
                            <th>Email</th>
                            <th>Quyền</th>
                            <th>Ngày tạo</th>
                            <th width="180">Hành động</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->ID }}</td>
                            <td>{{ $user->USER_NAME }}</td>
                            <td class="text-start">{{ $user->EMAIL }}</td>

                            <td>
                                @if($user->role === 'admin')
                                    <span class="badge bg-danger">Admin</span>
                                @elseif($user->role === 'superadmin')
                                    <span class="badge bg-secondary">Superadmin</span>
                                @else
                                    <span class="badge bg-secondary">User</span>
                                @endif
                            </td>

                            <td>
                                {{ $user->CREATE_DATE
                                    ? \Carbon\Carbon::parse($user->CREATE_DATE)->format('d/m/Y')
                                    : '-' }}
                            </td>

                            <td>
                                <div class="d-flex justify-content-center gap-1">

                                    @if ($status !== 'trash')
                                        <a href="{{ route('admin.user.edit', $user->ID) }}"
                                           class="btn btn-sm btn-outline-primary">
                                            Sửa
                                        </a>

                                        <form action="{{ route('admin.user.destroy', $user->ID) }}"
                                              method="POST"
                                              onsubmit="return confirm('Vô hiệu hóa user này?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-warning btn-sm">
                                                Vô hiệu hóa
                                            </button>
                                        </form>
                                    @else
                                        <form action="{{ route('admin.user.restore', $user->ID) }}"
                                              method="POST"
                                              onsubmit="return confirm('Khôi phục user này?')">
                                            @csrf
                                            <button class="btn btn-success btn-sm">
                                                Khôi phục
                                            </button>
                                        </form>
                                    @endif

                                </div>
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

        {{-- Pagination --}}
        <div class="d-flex justify-content-center mt-3">
            {{ $users->links('pagination::bootstrap-5') }}
        </div>

    </div>
</div>
@endsection

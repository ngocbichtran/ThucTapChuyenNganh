@extends('layout/home')

@section('body')

<style>
    .table td, .table th {
        vertical-align: middle;
    }

    .badge-soft-admin {
        background: rgba(220,53,69,.15);
        color: #dc3545;
    }

    .badge-soft-user {
        background: rgba(108,117,125,.15);
        color: #6c757d;
    }

    .badge-soft-super {
        background: #60bb54ff;
        color: #000000ff;
    }

    .filter-btns .btn {
        border-radius: 999px;
        padding: 6px 16px;
    }
</style>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="fw-bold mb-1">Quản lý người dùng</h5>
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item">User</li>
                <li class="breadcrumb-item active">Danh sách</li>
            </ol>
        </div>

        <a href="{{ route('admin.user.create') }}"
           class="btn btn-primary rounded-pill px-4">
            <i class="bi bi-plus-lg"></i> Thêm user
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body d-flex flex-wrap justify-content-between align-items-center gap-3">

            <div class="filter-btns btn-group">
                <a href="{{ route('admin.user.index',['status'=>'all']) }}"
                   class="btn btn-outline-primary {{ $status=='all'?'active':'' }}">
                    Tất cả ({{ $count['all'] }})
                </a>

                <a href="{{ route('admin.user.index',['status'=>'admin']) }}"
                   class="btn btn-outline-danger {{ $status=='admin'?'active':'' }}">
                    Admin ({{ $count['admin'] }})
                </a>

                <a href="{{ route('admin.user.index',['status'=>'user']) }}"
                   class="btn btn-outline-secondary {{ $status=='user'?'active':'' }}">
                    User ({{ $count['user'] }})
                </a>

                <a href="{{ route('admin.user.index',['status'=>'trash']) }}"
                   class="btn btn-outline-warning {{ $status=='trash'?'active':'' }}">
                    Vô hiệu ({{ $count['trash'] }})
                </a>
            </div>

            <form method="GET" action="{{ route('admin.user.index') }}" class="d-flex">
                <input type="hidden" name="status" value="{{ $status }}">
                <input type="text"
                       name="keyword"
                       value="{{ $keyword ?? '' }}"
                       class="form-control rounded-pill"
                       placeholder="Tìm user..."
                       style="width:240px">
                <button class="btn btn-primary rounded-pill ms-2 px-4">
                    Tìm
                </button>
            </form>

        </div>
    </div>

    @foreach(['success','error'] as $msg)
        @if(session($msg))
            <div class="alert alert-{{ $msg=='success'?'success':'danger' }} rounded-3">
                {{ session($msg) }}
            </div>
        @endif
    @endforeach

    @if($keyword && $users->total()==0)
        <div class="alert alert-warning rounded-3">
            Không tìm thấy kết quả cho: <strong>{{ $keyword }}</strong>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0 text-center">
                    <thead class="table-light">
                        <tr>
                            <th>Tên đăng nhập</th>
                            <th class="text-start">Email</th>
                            <th width="15%">Quyền</th>
                            <th width="15%">Ngày tạo</th>
                            <th width="20%">Hành động</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($users as $user)
                        <tr>
                            <td class="fw-semibold">{{ $user->USER_NAME }}</td>
                            <td class="text-start">{{ $user->EMAIL }}</td>

                            <td>
                                @if($user->role==='superadmin')
                                    <span class="badge badge-soft-super">Super</span>
                                @elseif($user->role==='admin')
                                    <span class="badge badge-soft-admin">Admin</span>
                                @else
                                    <span class="badge badge-soft-user">User</span>
                                @endif
                            </td>

                            <td>
                                {{ $user->CREATE_DATE
                                    ? \Carbon\Carbon::parse($user->CREATE_DATE)->format('d/m/Y')
                                    : '-' }}
                            </td>

                            <td>
                                @if($status!='trash')
                                    <a href="{{ route('admin.user.edit',$user->ID) }}"
                                       class="btn btn-sm btn-outline-primary rounded-pill px-3 me-1">
                                        Sửa
                                    </a>

                                    @if(
                                        $user->role!=='superadmin'
                                        && !(auth()->user()->role==='admin' && $user->role==='admin')
                                        && auth()->id()!=$user->ID
                                    )
                                        <form action="{{ route('admin.user.destroy',$user->ID) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Vô hiệu hóa user này?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-warning rounded-pill px-3">
                                                Vô hiệu
                                            </button>
                                        </form>
                                    @endif
                                @else
                                    <form action="{{ route('admin.user.restore',$user->ID) }}"
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
        {{ $users->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection

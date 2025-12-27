@extends('layout/home')

@section('body')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-0">Thêm người dùng</h4>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-header bg-white border-0 fw-semibold">
            Thông tin người dùng
        </div>

        <div class="card-body">
            <form action="{{ route('admin.user.store') }}" method="POST">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger rounded-3">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">
                            User Name <span class="text-danger">*</span>
                        </label>
                        <input type="text"
                               name="USER_NAME"
                               class="form-control"
                               value="{{ old('USER_NAME') }}"
                               placeholder="Nhập tên đăng nhập">
                        @error('USER_NAME')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">
                            Email <span class="text-danger">*</span>
                        </label>
                        <input type="email"
                               name="EMAIL"
                               class="form-control"
                               value="{{ old('EMAIL') }}"
                               placeholder="example@gmail.com">
                        @error('EMAIL')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">
                            Password <span class="text-danger">*</span>
                        </label>
                        <input type="password"
                               name="PASSWORD"
                               class="form-control"
                               placeholder="Nhập mật khẩu">
                        @error('PASSWORD')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">
                            Xác nhận mật khẩu <span class="text-danger">*</span>
                        </label>
                        <input type="password"
                               name="PASSWORD_CONFIRM"
                               class="form-control">
                    </div>

                    <div class="col-md-6 mb-3">
                        @if(auth()->user()->role === 'superadmin')
                            <label class="form-label fw-semibold">Quyền hạn</label>
                            <select name="role" class="form-select">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        @else
                            <input type="hidden" name="role" value="user">
                        @endif
                    </div>

                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('admin.user.index') }}"
                       class="btn btn-outline-secondary rounded-pill px-4">
                        ← Quay lại
                    </a>

                    <button type="submit"
                            class="btn btn-primary rounded-pill px-5">
                        Lưu người dùng
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection

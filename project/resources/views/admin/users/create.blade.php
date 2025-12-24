@extends('layout/home')

@section('body')
<div class="row">
    <div class="col-12">

        {{-- Breadcrumb --}}
        <div class="page-header mb-4">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h5 class="mb-0">Thêm người dùng</h5>
                    </div>
                    <div class="col-md-6 text-end">
                        <ul class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.user.index') }}">User</a>
                            </li>
                            <li class="breadcrumb-item active">Thêm mới</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card --}}
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Thông tin người dùng</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.user.store') }}" method="POST">
                    @csrf

                    {{-- Error --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row">

                        {{-- USER NAME --}}
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

                        {{-- EMAIL --}}
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

                        {{-- PASSWORD --}}
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
                            
                            <!-- Tránh lạm quyền, chỉ admin cao nhất mới tạo admin. -->
                           @if(auth()->user()->role === 'superadmin')
                           <label class="form-label fw-semibold">
                                Quyền hạn
                            </label>
                                <select name="role" class="form-select">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            @else
                                <input type="hidden" name="role" value="user">
                            @endif

                        </div>

                    </div>

                    {{-- Footer --}}
                    <div class="text-end mt-4">
                        <a href="{{ route('admin.user.index') }}"
                           class="btn btn-light me-2">
                            Quay lại
                        </a>
                        <button type="submit"
                                class="btn btn-primary">
                            Lưu người dùng
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection

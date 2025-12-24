@extends('layout/home')

@section('body')
<div class="row">
    <div class="col-12">

        {{-- Page header --}}
        <div class="page-header mb-4">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h5 class="mb-0">Cập nhật người dùng</h5>
                    </div>
                    <div class="col-md-6 text-end">
                        <ul class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.user.index') }}">User</a>
                            </li>
                            <li class="breadcrumb-item active">Chỉnh sửa</li>
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
                <form action="{{ route('admin.user.update', $user->ID) }}" method="POST">
                    @csrf
                    @method('PUT')

                    {{-- Success --}}
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

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
                                   class="form-control @error('USER_NAME') is-invalid @enderror"
                                   value="{{ old('USER_NAME', $user->USER_NAME) }}">
                            @error('USER_NAME')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- PASSWORD --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">
                                Password
                                <small class="text-muted">(để trống nếu không đổi)</small>
                            </label>
                            <input type="password"
                                   name="PASSWORD"
                                   class="form-control @error('PASSWORD') is-invalid @enderror">
                            @error('PASSWORD')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>

                    <div class="row">

                        {{-- EMAIL --}}
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">
                                Email <span class="text-danger">*</span>
                            </label>
                           @if(auth()->id() == $user->ID)
                                <input type="email"
                                    class="form-control"
                                    value="{{ $user->EMAIL }}"
                                    disabled>
                                <input type="hidden" name="EMAIL" value="{{ $user->EMAIL }}">
                            @else
                                <input type="email"
                                    name="EMAIL"
                                    class="form-control @error('EMAIL') is-invalid @enderror"
                                    value="{{ old('EMAIL', $user->EMAIL) }}">
                            @endif
                            @error('EMAIL')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                 
                        <div class="col-md-6 mb-3">
                       

                        @if(auth()->id() == $user->ID)
                            <!-- Không cho sửa role của chính mình -->
                            <input type="text" class="form-control" value="{{ $user->role }}" disabled>
                            <input type="hidden" name="role" value="{{ $user->role }}">
                        @elseif(auth()->user()->role === 'admin' && $user->role === 'superadmin')
                            <!-- Admin không được sửa superadmin -->
                            <input type="text" class="form-control" value="superadmin" disabled>
                            <input type="hidden" name="role" value="superadmin">
                        @else
                            <label class="form-label fw-semibold">Quyền</label>
                            <!-- Superadmin sửa được admin & user -->
                            <select name="role" class="form-select">
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>
                                    Admin
                                </option>
                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>
                                    User
                                </option>
                            </select>
                        @endif
                    </div>


                    </div>

                    {{-- Action --}}
                    <div class="text-end mt-4">
                        <a href="{{ route('admin.user.index') }}"
                           class="btn btn-light me-2">
                            Quay lại
                        </a>
                        <button class="btn btn-primary">
                            Lưu thay đổi
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection

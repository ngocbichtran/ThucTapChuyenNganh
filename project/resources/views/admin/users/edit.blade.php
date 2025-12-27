@extends('layout/home')

@section('body')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="mb-0">Cập nhật người dùng</h4>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-header bg-white border-0 fw-semibold">
            Thông tin người dùng
        </div>

        <div class="card-body">
            <form action="{{ route('admin.user.update', $user->ID) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Success --}}
                @if(session('success'))
                    <div class="alert alert-success rounded-3">
                        {{ session('success') }}
                    </div>
                @endif

                {{-- Error --}}
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

                    {{-- ROLE --}}
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-semibold">Quyền</label>

                        @if(auth()->id() == $user->ID)
                            <input type="text"
                                   class="form-control"
                                   value="{{ $user->role }}"
                                   disabled>
                            <input type="hidden" name="role" value="{{ $user->role }}">

                        @elseif(auth()->user()->role === 'admin' && $user->role === 'superadmin')
                            <input type="text"
                                   class="form-control"
                                   value="superadmin"
                                   disabled>
                            <input type="hidden" name="role" value="superadmin">

                        @else
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

                {{-- Footer --}}
                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('admin.user.index') }}"
                       class="btn btn-outline-secondary rounded-pill px-4">
                        ← Quay lại
                    </a>

                    <button type="submit"
                            class="btn btn-primary rounded-pill px-5">
                        Lưu thay đổi
                    </button>
                </div>

            </form>
        </div>
    </div>

</div>
@endsection

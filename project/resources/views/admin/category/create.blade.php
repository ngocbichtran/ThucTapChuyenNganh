@extends('layout/home')

@section('body')
<div class="row">
    <div class="col-12">

        {{-- Breadcrumb --}}
        <div class="page-header mb-4">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h5 class="mb-0">Thêm loại sản phẩm</h5>
                    </div>
                    <div class="col-md-6 text-end">
                        <ul class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.category.index') }}">Category</a>
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
                <h5 class="mb-0">Thông tin loại sản phẩm</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.category.store') }}" method="POST">
                    @csrf

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
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">
                                Tên loại <span class="text-danger">*</span>
                            </label>
                            <input type="text"
                                    name="TYPE"
                                    class="form-control"
                                    value="{{ old('TYPE') }}"
                                    placeholder="Ví dụ: Đồ uống">

                            @error('TYPE')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">
                                Trạng thái
                            </label>
                            <select name="ACTIVE_FLAG" class="form-select">
                                <option value="1" {{ old('ACTIVE_FLAG', 1) == 1 ? 'selected' : '' }}>
                                    Đã bày bán
                                </option>
                                <option value="0" {{ old('ACTIVE_FLAG') === '0' ? 'selected' : '' }}>
                                    Chưa bày bán
                                </option>
                            </select>

                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">
                            Mô tả
                        </label>
                        <textarea name="DESCRIPTION"
                                rows="3"
                                class="form-control"
                                placeholder="Mô tả ngắn về loại sản phẩm">{{ old('DESCRIPTION') }}</textarea>
                        @error('DESCRIPTION')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    {{-- Footer --}}
                    <div class="text-end mt-4">
                        <a href="{{ route('admin.category.index') }}"
                           class="btn btn-light me-2">
                            Quay lại
                        </a>
                        <button type="submit"
                                class="btn btn-primary">
                            Lưu loại sản phẩm
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection

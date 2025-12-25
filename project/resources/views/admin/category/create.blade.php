@extends('layout/home')
@section('body')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <div class="d-flex align-items-center gap-2 mb-1">
            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                 style="width:38px;height:38px;">
                <i class="bi bi-tags"></i>
            </div>
            <h5 class="page-title mb-0">Thêm loại sản phẩm</h5>
        </div>

        <ol class="breadcrumb mb-0 small">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.category.index') }}">Danh mục</a>
            </li>
            <li class="breadcrumb-item active">Thêm mới</li>
        </ol>
    </div>
</div>

<div class="card card-soft">
    <div class="card-body p-4">

        <form action="{{ route('admin.category.store') }}" method="POST">
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

            <div class="row g-4">
                <div class="col-md-6">
                    <label class="form-label fw-semibold required">
                        Tên loại
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

                <div class="col-md-6">
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

                <div class="col-12">
                    <label class="form-label fw-semibold">
                        Mô tả
                    </label>
                    <textarea name="DESCRIPTION"
                              rows="3"
                              class="form-control"
                              placeholder="Mô tả ngắn về loại sản phẩm">{{ old('DESCRIPTION') }}</textarea>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-5">
                <a href="{{ route('admin.category.index') }}"
                   class="btn btn-light btn-rounded">
                    <i class="bi bi-arrow-left"></i> Quay lại
                </a>

                <button type="submit"
                        class="btn btn-primary btn-rounded">
                    <i class="bi bi-save"></i> Lưu loại sản phẩm
                </button>
            </div>

        </form>

    </div>
</div>

@endsection

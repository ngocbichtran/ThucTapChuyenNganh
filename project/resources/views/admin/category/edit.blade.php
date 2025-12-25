@extends('layout/home')

@section('body')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <div class="d-flex align-items-center gap-2 mb-1">
            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                 style="width:38px;height:38px;">
                <i class="bi bi-tags"></i>
            </div>
            <h5 class="fw-bold mb-0">
                {{ isset($category) ? 'Cập nhật danh mục' : 'Thêm danh mục' }}
            </h5>
        </div>

        <ol class="breadcrumb mb-0 small">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.category.index') }}">Danh mục</a>
            </li>
            <li class="breadcrumb-item active">
                {{ isset($category) ? 'Chỉnh sửa' : 'Thêm mới' }}
            </li>
        </ol>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">

        <h6 class="fw-semibold mb-4">
            <i class="bi bi-info-circle me-1"></i>
            Thông tin danh mục
        </h6>

        <form
            action="{{ isset($category)
                ? route('admin.category.update', $category->ID)
                : route('admin.category.store') }}"
            method="POST"
        >
            @csrf
            @isset($category)
                @method('PUT')
            @endisset

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
                    <label class="form-label fw-semibold">
                        Tên loại <span class="text-danger">*</span>
                    </label>
                    <input type="text"
                           name="TYPE"
                           class="form-control rounded-3"
                           value="{{ old('TYPE', $category->TYPE ?? '') }}"
                           placeholder="Ví dụ: Đồ uống">

                    @error('TYPE')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label class="form-label fw-semibold">
                        Trạng thái
                    </label>
                    <select name="ACTIVE_FLAG" class="form-select rounded-3">
                        <option value="1"
                            {{ old('ACTIVE_FLAG', $category->ACTIVE_FLAG ?? 1) == 1 ? 'selected' : '' }}>
                            Đã bày bán
                        </option>
                        <option value="0"
                            {{ old('ACTIVE_FLAG', $category->ACTIVE_FLAG ?? 1) == 0 ? 'selected' : '' }}>
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
                              class="form-control rounded-3"
                              placeholder="Mô tả ngắn về danh mục">{{ old('DESCRIPTION', $category->DESCRIPTION ?? '') }}</textarea>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-5">
                <a href="{{ route('admin.category.index') }}"
                   class="btn btn-light px-4 rounded-pill">
                    <i class="bi bi-arrow-left"></i> Quay lại
                </a>

                <button type="submit"
                        class="btn btn-primary px-4 rounded-pill">
                    <i class="bi bi-save"></i>
                    {{ isset($category) ? 'Cập nhật' : 'Lưu danh mục' }}
                </button>
            </div>

        </form>
    </div>
</div>

@endsection

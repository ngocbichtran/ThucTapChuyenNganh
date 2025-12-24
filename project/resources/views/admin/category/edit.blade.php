@extends('layout/home')

@section('body')
<div class="row">
    <div class="col-12">

        {{-- Page header --}}
        <div class="page-header mb-4">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h5 class="mb-0">
                            {{ isset($category) ? 'Cập nhật danh mục' : 'Thêm danh mục' }}
                        </h5>
                    </div>
                    <div class="col-md-6 text-end">
                        <ul class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.category.index') }}">Danh mục</a>
                            </li>
                            <li class="breadcrumb-item active">
                                {{ isset($category) ? 'Chỉnh sửa' : 'Thêm mới' }}
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        {{-- Card --}}
        <div class="card">
            <div class="card-header">
                <h5 class="mb-0">Thông tin danh mục</h5>
            </div>

            <div class="card-body">
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
                        <div class="alert alert-danger mb-3">
                            <ul class="mb-0 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Tên loại</label>
                            <input type="text"
                                   name="TYPE"
                                   class="form-control"
                                   value="{{ old('TYPE', $category->TYPE ?? '') }}">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold">Trạng thái</label>
                            <select name="ACTIVE_FLAG" class="form-select">
                                <option value="1"
                                    {{ old('ACTIVE_FLAG', $category->ACTIVE_FLAG ?? '') == 1 ? 'selected' : '' }}>
                                    Đã bày bán
                                </option>
                                <option value="0"
                                    {{ old('ACTIVE_FLAG', $category->ACTIVE_FLAG ?? '') == 0 ? 'selected' : '' }}>
                                    Chưa bày bán
                                </option>
                            </select>
                        </div>

                        <div class="col-12 mb-3">
                            <label class="form-label fw-semibold">Mô tả</label>
                            <textarea name="DESCRIPTION"
                                      rows="3"
                                      class="form-control">{{ old('DESCRIPTION', $category->DESCRIPTION ?? '') }}</textarea>
                        </div>
                    </div>

                    {{-- Action --}}
                    <div class="text-end mt-4">
                        <a href="{{ route('admin.category.index') }}"
                           class="btn btn-light me-2">
                            Quay lại
                        </a>
                        <button type="submit"
                                class="btn btn-primary">
                            {{ isset($category) ? 'Cập nhật' : 'Lưu' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection

@extends('layout/home')

@section('body')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <div class="d-flex align-items-center gap-2 mb-1">
            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center"
                 style="width:38px;height:38px;">
                <i class="bi bi-box-seam"></i>
            </div>
            <h5 class="fw-bold mb-0">Thêm sản phẩm</h5>
        </div>

        <ol class="breadcrumb mb-0 small">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.product.index') }}">Sản phẩm</a>
            </li>
            <li class="breadcrumb-item active">Thêm mới</li>
        </ol>
    </div>
</div>

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">

        <h6 class="fw-semibold mb-4">
            <i class="bi bi-info-circle me-1"></i>
            Thông tin sản phẩm
        </h6>

        <form action="{{ route('admin.product.store') }}" method="POST">
            @csrf

            @if(session('success'))
                <div class="alert alert-success rounded-3">
                    {{ session('success') }}
                </div>
            @endif

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
                    <div>
                        <label class="form-label fw-semibold">
                            Tên sản phẩm <span class="text-danger">*</span>
                        </label>
                        <input type="text"
                               name="NAME"
                               class="form-control rounded-3"
                               value="{{ old('NAME') }}"
                               placeholder="Ví dụ: iPhone 15 Pro">

                        @error('NAME')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <label class="form-label fw-semibold">
                            Giá sản phẩm <span class="text-danger">*</span>
                        </label>
                        <input type="number"
                               name="PRICE"
                               class="form-control rounded-3"
                               value="{{ old('PRICE') }}"
                               min="0"
                               placeholder="VNĐ">

                        @error('PRICE')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div>
                        <label class="form-label fw-semibold">
                            Hình ảnh (URL)
                        </label>
                        <input type="text"
                               name="IMG_URL"
                               class="form-control rounded-3"
                               value="{{ old('IMG_URL') }}"
                               placeholder="https://...">

                        @error('IMG_URL')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                <div class="col-md-6">

                    <div>
                        <label class="form-label fw-semibold">
                            Loại sản phẩm
                        </label>
                        <select name="CATE_ID" class="form-select rounded-3">
                            @foreach ($categoryList as $cate)
                                <option value="{{ $cate->ID }}">
                                    {{ $cate->TYPE }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="form-label fw-semibold">
                            Trạng thái
                        </label>
                        <select name="ACTIVE_FLAG" class="form-select rounded-3">
                            <option value="1">🟢 Đã bày bán</option>
                            <option value="0">⚪ Chưa bày bán</option>
                        </select>
                    </div>

                </div>

                <div class="col-12">
                    <label class="form-label fw-semibold">
                        Mô tả
                    </label>
                    <textarea name="DESCRIPTION"
                              rows="3"
                              class="form-control rounded-3"
                              placeholder="Mô tả ngắn về sản phẩm">{{ old('DESCRIPTION') }}</textarea>
                </div>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-5">
                <a href="{{ route('admin.product.index') }}"
                   class="btn btn-light px-4 rounded-pill">
                    <i class="bi bi-arrow-left"></i> Quay lại
                </a>

                <button type="submit"
                        class="btn btn-primary px-4 rounded-pill">
                    <i class="bi bi-save"></i> Lưu sản phẩm
                </button>
            </div>

        </form>

    </div>
</div>

@endsection

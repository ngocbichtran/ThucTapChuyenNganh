@extends('layout/home')

@section('body')
<div class="row">
    <div class="col-12">

        {{-- Page header --}}
        <div class="page-header mb-4">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h5 class="mb-0">Thêm sản phẩm</h5>
                    </div>
                    <div class="col-md-6 text-end">
                        <ul class="breadcrumb mb-0">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.product.index') }}">Sản phẩm</a>
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
                <h5 class="mb-0">Thông tin sản phẩm</h5>
            </div>

            <div class="card-body">
                <form action="{{ route('admin.product.store') }}" method="POST">
                    @csrf

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

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
                        {{-- Cột trái --}}
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Tên sản phẩm</label>
                                <input type="text"
                                       name="NAME"
                                       class="form-control"
                                       value="{{ old('NAME') }}">
                                @error('NAME')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                                <div class="mb-3">
                                    <label class="form-label fw-semibold">Giá sản phẩm</label>
                                    <input type="number"
                                        name="PRICE"
                                        class="form-control"
                                        value="{{ old('PRICE') }}"
                                        min="0">
                                    @error('PRICE')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Hình ảnh (URL)</label>
                                <input type="text"
                                       name="IMG_URL"
                                       class="form-control"
                                       value="{{ old('IMG_URL') }}">
                                @error('IMG_URL')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                        </div>

                        {{-- Cột phải --}}
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Loại sản phẩm</label>
                                <select name="CATE_ID" class="form-select">
                                    @foreach ($categoryList as $cate)
                                        <option value="{{ $cate->ID }}">
                                            {{ $cate->TYPE }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Trạng thái</label>
                                <select name="ACTIVE_FLAG" class="form-select">
                                    <option value="1">Đã bày bán</option>
                                    <option value="0">Chưa bày bán</option>
                                </select>
                            </div>

                        </div>

                        {{-- Mô tả --}}
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Mô tả</label>
                                <textarea name="DESCRIPTION"
                                          rows="3"
                                          class="form-control">{{ old('DESCRIPTION') }}</textarea>
                            </div>
                        </div>
                    </div>

                    {{-- Action --}}
                    <div class="text-end mt-4">
                        <a href="{{ route('admin.product.index') }}"
                           class="btn btn-light me-2">
                            Quay lại
                        </a>
                        <button type="submit"
                                class="btn btn-primary">
                            Lưu sản phẩm
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection

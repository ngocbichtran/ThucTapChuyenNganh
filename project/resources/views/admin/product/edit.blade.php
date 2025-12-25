@extends('layout/home')

@section('body')
<div class="row">
    <div class="col-12">

        <div class="page-header mb-4">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h5 class="mb-0">Cập nhật sản phẩm</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.product.update', $product->ID) }}" method="POST">
                    @csrf
                    @method('PUT')

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
                        <div class="col-md-6">

                            <div class="mb-3">
                                <label class="form-label fw-semibold">ID</label>
                                <input type="text"
                                       class="form-control"
                                       value="{{ $product->ID }}"
                                       readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Loại sản phẩm</label>
                                <select name="CATE_ID" class="form-select">
                                    @foreach ($categories as $cate)
                                        <option value="{{ $cate->ID }}"
                                            {{ old('CATE_ID', $product->CATE_ID) == $cate->ID ? 'selected' : '' }}>
                                            {{ $cate->TYPE }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Tên sản phẩm</label>
                                <input type="text"
                                       name="NAME"
                                       class="form-control"
                                       value="{{ old('NAME', $product->NAME) }}">
                            </div>
                           

                        </div>

                        <div class="col-md-6">

                            <div class="mb-3">
                                <label class="form-label fw-semibold">IMG URL</label>
                                <input type="text"
                                       name="IMG_URL"
                                       class="form-control"
                                       value="{{ old('IMG_URL', $product->IMG_URL) }}">
                            </div>
                             <div class="mb-3">
                                <label class="form-label fw-semibold">Giá sản phẩm</label>
                                <input type="number"
                                    name="PRICE"
                                    class="form-control"
                                    value="{{ old('PRICE', $product->PRICE) }}"
                                    min="0">
                                @error('PRICE')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold">Trạng thái</label>
                                <select name="ACTIVE_FLAG" class="form-select">
                                    <option value="1" {{ old('ACTIVE_FLAG', $product->ACTIVE_FLAG) == 1 ? 'selected' : '' }}>
                                        Đã bày bán
                                    </option>
                                    <option value="0" {{ old('ACTIVE_FLAG', $product->ACTIVE_FLAG) == 0 ? 'selected' : '' }}>
                                        Chưa bày bán
                                    </option>
                                </select>
                            </div>

                        </div>

                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Mô tả</label>
                                <textarea name="DESCRIPTION"
                                          rows="3"
                                          class="form-control">{{ old('DESCRIPTION', $product->DESCRIPTION) }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="text-end mt-4">
                        <a href="{{ route('admin.product.index') }}"
                           class="btn btn-light me-2">
                            Quay lại
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Cập nhật
                        </button>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
@endsection

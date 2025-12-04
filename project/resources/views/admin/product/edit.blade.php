@extends('layout/home')

@section('body')
<div class="card shadow-lg mx-auto" style="max-width: 900px; border-radius: 15px;">
    <div class="card-body" style="background: #f8f9fa; border-radius: 15px;">

        <h3 class="text-center mb-2" style="font-weight: 600;">Cập nhật sản phẩm</h3>

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
                        <label class="form-label">ID</label>
                        <input type="text" name="ID" class="form-control"
                               value="{{ $product->ID }}" readonly>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Loại sản phẩm</label>
                        <select name="CATE_ID" class="form-control">
                            @foreach ($categories as $cate)
                                <option 
                                    value="{{ $cate->ID }}"
                                    {{ old('CATE_ID', $product->CATE_ID) == $cate->ID ? 'selected' : '' }}>
                                    {{ $cate->TYPE }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tên sản phẩm</label>
                        <input type="text" name="NAME" class="form-control"
                               value="{{ old('NAME', $product->NAME) }}">
                    </div>

                </div>

      
                <div class="col-md-6">

                    <div class="mb-3">
                        <label class="form-label">IMG URL</label>
                        <input type="text" name="IMG_URL" class="form-control"
                               value="{{ old('IMG_URL', $product->IMG_URL) }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Trạng thái</label>
                        <select name="ACTIVE_FLAG" class="form-control">
                            <option value="1" {{ old('ACTIVE_FLAG', $product->ACTIVE_FLAG) == 1 ? 'selected' : '' }}>Đã bày bán</option>
                            <option value="0" {{ old('ACTIVE_FLAG', $product->ACTIVE_FLAG) == 0 ? 'selected' : '' }}>Chưa bày bán</option>
                        </select>
                    </div>

                </div>

       
                <div class="col-md-12 mt-2">
                    <div class="mb-4">
                        <label class="form-label">Mô tả</label>
                        <textarea name="DESCRIPTION" class="form-control" rows="3">{{ old('DESCRIPTION', $product->DESCRIPTION) }}</textarea>
                    </div>
                </div>

            </div>

            <button type="submit" class="btn btn-success w-100 py-2" style="font-size: 16px;">Cập nhật</button>

        </form>

    </div>
</div>
@endsection

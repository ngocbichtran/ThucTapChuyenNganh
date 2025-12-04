@extends('layout/home')

@section('body')

<div class="container">

    <div class="mx-auto" style="max-width: 780px;">

        <form action="{{ route('admin.product.store') }}"
              method="POST"
              class="p-4 shadow-lg bg-white">
            @csrf

            <h3 class="text-center text-primary fw-bold">Thêm sản phẩm</h3>

            @if(session('success')) <div class="alert alert-success" style="margin:0;"> {{ session('success') }} </div> @endif
            
            @if ($errors->any())
                <div class="alert alert-danger rounded-3">
                    <ul class="m-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="row g-4">

                <div class="col-md-6">

                    <div class="form-group">
                        <label for="name" class="fw-semibold">Tên sản phẩm</label>
                        <input type="text" id="name" name="NAME" 
                               class="form-control form-control-lg rounded-3">
                        @error('NAME')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

   
                    <div class="form-group mt-3">
                        <label for="img" class="fw-semibold">Hình ảnh (URL)</label>
                        <input type="text" id="img" name="IMG_URL"
                               class="form-control form-control-lg rounded-3">
                        @error('IMG_URL')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cate" class="fw-semibold">Loại sản phẩm</label>
                        <select id="cate" name="CATE_ID" 
                                class="form-control form-control-lg rounded-3">
                            @foreach ($categoryList as $cate)
                                <option value="{{ $cate->ID }}">{{ $cate->TYPE }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group mt-3">
                        <label for="flag" class="fw-semibold">Trạng thái</label>
                        <select id="flag" name="ACTIVE_FLAG"
                                class="form-control form-control-lg rounded-3">
                            <option value="1">Đã bày bán</option>
                            <option value="0">Chưa bày bán</option>
                        </select>
                    </div>

                </div>

                <div class="col-12">
                    <div class="form-group">
                        <label for="desc" class="fw-semibold">Mô tả</label>
                        <textarea id="desc" name="DESCRIPTION" rows="3"
                                  class="form-control form-control-lg rounded-3"></textarea>
                    </div>
                </div>

            </div>

            <button type="submit" 
                    class="btn btn-primary w-100 mt-4 py-2 rounded-3 fw-semibold">
                Lưu sản phẩm
            </button>

        </form>

    </div>

</div>

@endsection

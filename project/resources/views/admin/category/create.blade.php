@extends('layout/home')

@section('body')

<div class="container">

    <div class="mx-auto" style="max-width: 480px;">

        <form action="{{ route('admin.category.store') }}" 
              method="POST" 
              class="p-4 bg-white shadow-lg">
            @csrf

            <h3 class="text-center mb-4 text-primary fw-bold">Thêm Loại Sản Phẩm</h3>

            @if ($errors->any())
                <div class="alert alert-danger rounded-3">
                    <ul class="m-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group mb-3">
                <label for="type" class="fw-semibold">Tên loại</label>
                <input type="text" id="type" name="TYPE" class="form-control rounded-3">
                @error('TYPE') 
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="desc" class="fw-semibold">Mô tả</label>
                <textarea id="desc" name="DESCRIPTION" rows="3"
                          class="form-control rounded-3"></textarea>
                @error('DESCRIPTION') 
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="flag" class="fw-semibold">Trạng thái</label>
                <select id="flag" name="ACTIVE_FLAG" class="form-control rounded-3">
                    <option value="1">Đã bày bán</option>
                    <option value="0">Chưa bày bán</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary w-100 py-2 mt-2 rounded-3 fw-semibold">
                Lưu loại sản phẩm
            </button>

        </form>

    </div>

</div>

@endsection

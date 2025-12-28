@extends('layout.home')

@section('title', 'Chỉnh sửa trang About')

@section('body')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold mb-0">Chỉnh sửa trang About</h4>
        <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left"></i> Quay lại
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success d-flex align-items-center">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.about.update', $about->id) }}"
          method="POST"
          enctype="multipart/form-data">
        @csrf

        <div class="row g-4">

            <!-- Cột trái -->
            <div class="col-lg-8">
                <div class="card shadow-sm border-0">
                    <div class="card-body">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Tiêu đề</label>
                            <input type="text"
                                   name="tieuDe"
                                   class="form-control"
                                   placeholder="Nhập tiêu đề trang About"
                                   value="{{ old('tieuDe', $about->tieuDe ?? '') }}">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Mô tả ngắn</label>
                            <textarea name="moTa"
                                      class="form-control"
                                      rows="2"
                                      placeholder="Mô tả ngắn gọn về Capy Shop">{{ old('moTa', $about->moTa ?? '') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Giới thiệu Capy Shop</label>
                            <textarea name="gioiThieu"
                                      class="form-control"
                                      rows="5"
                                      placeholder="Nội dung giới thiệu chi tiết">{{ old('gioiThieu', $about->gioiThieu ?? '') }}</textarea>
                        </div>

                        <div class="mb-0">
                            <label class="form-label fw-semibold">Hướng phát triển</label>
                            <textarea name="huongPhatTrien"
                                      class="form-control"
                                      rows="4"
                                      placeholder="Định hướng phát triển trong tương lai">{{ old('huongPhatTrien', $about->huongPhatTrien ?? '') }}</textarea>
                        </div>

                    </div>
                </div>
            </div>

            <!-- Cột phải -->
            <div class="col-lg-4">
                <div class="card shadow-sm border-0">
                    <div class="card-body">

                        <label class="form-label fw-semibold">Hình ảnh đại diện</label>
                        <input type="file"
                               name="hinhAnh"
                               class="form-control mb-3">

                        @if($about && $about->hinhAnh)
                            <div class="text-center">
                                <img src="{{ asset('storage/'.$about->hinhAnh) }}"
                                     class="img-fluid rounded shadow-sm"
                                     style="max-height: 220px;">
                                <p class="text-muted mt-2 mb-0">Ảnh hiện tại</p>
                            </div>
                        @else
                            <p class="text-muted fst-italic mb-0">
                                Chưa có hình ảnh About
                            </p>
                        @endif

                    </div>
                </div>
            </div>

        </div>

        <div class="mt-4 text-end">
            <button type="submit" class="btn btn-primary px-4">
                <i class="bi bi-save me-1"></i> Lưu thay đổi
            </button>
        </div>

    </form>

</div>
@endsection

@extends('layout.shop')

@section('body')

<div class="container py-5">

@if($about)

    <!-- Tiêu đề -->
    <div class="text-center mb-5">
        <h2 class="fw-bold mt-3">{{ $about->tieuDe }}</h2>
        <p class="text-muted mt-3 mx-auto" style="max-width: 700px;">
            {{ $about->moTa }}
        </p>
    </div>

    <!-- Giới thiệu -->
    <div class="row align-items-center mb-5">
        <div class="col-md-6 mb-4 mb-md-0">
            <div class="p-3 rounded-4"
                 style="background: linear-gradient(135deg,#a1c4fd,#c2e9fb);">
                @if(!empty($about->hinhAnh))
                    <img src="{{ asset('storage/'.$about->hinhAnh) }}"
                         class="img-fluid rounded-4 shadow"
                         alt="About Capy Shop">
                @endif
            </div>
        </div>

        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <p class="text-muted lh-lg mb-0">
                        {{ $about->gioiThieu }}
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Hướng phát triển -->
    <div class="rounded-4 p-5 text-center shadow"
         style="background: linear-gradient(135deg,#fdfbfb,#ebedee);">
        <p class="text-muted mb-0 lh-lg mx-auto" style="max-width: 800px;">
            {{ $about->huongPhatTrien }}
        </p>
    </div>

@else
    <div class="text-center py-5">
        <div class="d-inline-block p-4 rounded-circle mb-3"
             style="background: linear-gradient(135deg,#fbc2eb,#a6c1ee);">
            <i class="bi bi-info-circle fs-1 text-white"></i>
        </div>
        <p class="text-muted mt-3">
            Nội dung About đang được cập nhật
        </p>
    </div>
@endif

</div>

@endsection

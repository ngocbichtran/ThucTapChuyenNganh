@extends('layout/home')

@section('title', 'Chi tiết phiếu xuất kho')

@section('body')
<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="fw-bold mb-1">Chi tiết phiếu xuất kho</h5>
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item">Kho</li>
                <li class="breadcrumb-item">Phiếu xuất</li>
                <li class="breadcrumb-item active">Chi tiết</li>
            </ol>
        </div>

        <a href="{{ route('admin.xuat.index') }}"
           class="btn btn-light rounded-pill px-4">
            ← Quay lại
        </a>
    </div>


    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body">
            <h6 class="fw-bold mb-3">Thông tin phiếu xuất</h6>

            <div class="row g-3">
                <div class="col-md-4">
                    <div class="text-muted small">Mã phiếu</div>
                    <div class="fw-semibold">{{ $receipt->receiptCode }}</div>
                </div>

                <div class="col-md-4">
                    <div class="text-muted small">Khách hàng</div>
                    <div class="fw-semibold">{{ $receipt->customer }}</div>
                </div>

                <div class="col-md-4">
                    <div class="text-muted small">Ngày xuất</div>
                    <div class="fw-semibold">
                        {{ $receipt->created_at->format('d/m/Y H:i') }}
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="text-muted small">Trạng thái</div>
                    @if($receipt->status == 'pending')
                        <span class="badge badge-soft-warning">Chờ duyệt</span>
                    @elseif($receipt->status == 'completed')
                        <span class="badge badge-soft-success">Đã duyệt</span>
                    @endif
                </div>

                <div class="col-md-8">
                    <div class="text-muted small">Ghi chú</div>
                    <div class="fw-semibold">
                        {{ $receipt->note ?? 'Không có' }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body p-0">

            <div class="px-4 pt-3">
                <h6 class="fw-bold mb-0">Danh sách sản phẩm xuất</h6>
            </div>

            <div class="table-responsive mt-3">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-center">
                        <tr>
                            <th width="60">STT</th>
                            <th class="text-start">Sản phẩm</th>
                            <th width="120">Số lượng</th>
                            <th width="160">Đơn giá</th>
                            <th width="180">Thành tiền</th>
                        </tr>
                    </thead>

                    <tbody class="text-center">
                        @foreach($receipt->details as $index => $detail)
                            <tr>
                                <td>{{ $index + 1 }}</td>

                                <td class="text-start fw-semibold">
                                    {{ $detail->product->NAME ?? 'N/A' }}
                                </td>

                                <td>{{ $detail->quantity }}</td>

                                <td>
                                    {{ number_format($detail->price, 0, ',', '.') }} đ
                                </td>

                                <td class="fw-bold text-danger">
                                    {{ number_format($detail->quantity * $detail->price, 0, ',', '.') }} đ
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                    <tfoot class="table-light">
                        <tr>
                            <th colspan="4" class="text-end fw-bold">
                                Tổng tiền
                            </th>
                            <th class="text-danger fw-bold text-center">
                                {{ number_format($receipt->totals, 0, ',', '.') }} đ
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>

        </div>
    </div>

    @if($receipt->status == 'pending')
        <div class="text-end">
            <form action="{{ route('admin.xuat.update', $receipt->id) }}"
                  method="POST"
                  onsubmit="return confirm('Bạn có chắc muốn duyệt phiếu xuất kho này?')">
                @csrf
                @method('PUT')

                <button class="btn btn-success rounded-pill px-5">
                    Duyệt phiếu xuất kho
                </button>
            </form>
        </div>
    @endif

</div>
@endsection

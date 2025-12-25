@extends('layout/home')

@section('title', 'Chi tiết phiếu nhập kho')

@section('body')
<div class="container-fluid">

<div class="page-header mb-4">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="mb-0">Chi tiết phiếu nhập kho</h5>
                </div>
                <div class="col-md-6 text-end">
                    <a href="{{ route('admin.nhap.index') }}"
                       class="btn btn-light rounded-pill px-4">
                        ← Quay lại
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body">

            <div class="row g-3 mb-3">
                <div class="col-md-4">
                    <div class="text-muted small">Mã phiếu</div>
                    <div class="fw-semibold">{{ $receipt->receiptCode }}</div>
                </div>

                <div class="col-md-4">
                    <div class="text-muted small">Nhà cung cấp</div>
                    <div class="fw-semibold">{{ $receipt->supplier }}</div>
                </div>

                <div class="col-md-4">
                    <div class="text-muted small">Ngày nhập</div>
                    <div class="fw-semibold">
                        {{ $receipt->created_at->format('d/m/Y H:i') }}
                    </div>
                </div>
            </div>

            <div class="row g-3">
                <div class="col-md-4">
                    <div class="text-muted small">Trạng thái</div>
                    @if($receipt->status == 'pending')
                        <span class="badge bg-warning text-dark px-3 py-2 rounded-pill">
                            Chờ duyệt
                        </span>
                    @elseif($receipt->status == 'completed')
                        <span class="badge bg-success px-3 py-2 rounded-pill">
                            Đã duyệt
                        </span>
                    @else
                        <span class="badge bg-secondary px-3 py-2 rounded-pill">
                            Đã hủy
                        </span>
                    @endif
                </div>

                <div class="col-md-8">
                    <div class="text-muted small">Ghi chú</div>
                    <div class="fw-semibold">
                        {{ $receipt->note ?? 'Không có ghi chú' }}
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-header bg-white border-0 pt-4 px-4">
            <h6 class="mb-0">Danh sách sản phẩm nhập</h6>
        </div>

        <div class="card-body p-0">
            <table class="table align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="50">#</th>
                        <th>Sản phẩm</th>
                        <th width="120" class="text-center">Số lượng</th>
                        <th width="150" class="text-end">Đơn giá</th>
                        <th width="180" class="text-end">Thành tiền</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($receipt->details as $index => $detail)
                        <tr>
                            <td class="text-muted">{{ $index + 1 }}</td>
                            <td class="fw-semibold">
                                {{ $detail->product->NAME ?? 'N/A' }}
                            </td>
                            <td class="text-center">
                                {{ $detail->quantity }}
                            </td>
                            <td class="text-end">
                                {{ number_format($detail->price, 0, ',', '.') }} đ
                            </td>
                            <td class="text-end fw-semibold">
                                {{ number_format($detail->quantity * $detail->price, 0, ',', '.') }} đ
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot class="table-light">
                    <tr>
                        <th colspan="4" class="text-end">Tổng tiền</th>
                        <th class="text-end text-danger fs-6">
                            {{ number_format($receipt->totals, 0, ',', '.') }} đ
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    @if($receipt->status == 'pending')
        <div class="text-end">
            <form action="{{ route('admin.nhap.update', $receipt->id) }}"
                  method="POST"
                  onsubmit="return confirm('Bạn có chắc muốn duyệt phiếu nhập này?')">
                @csrf
                @method('PUT')
                <button class="btn btn-success rounded-pill px-4">
                    Duyệt phiếu nhập kho
                </button>
            </form>
        </div>
    @endif

</div>
@endsection

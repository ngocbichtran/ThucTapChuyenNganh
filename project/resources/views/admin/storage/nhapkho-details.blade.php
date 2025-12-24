@extends('layout/home')

@section('title', 'Chi tiết phiếu nhập kho')

@section('body')
<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">📄 Chi tiết phiếu nhập kho</h4>
        <a href="{{ route('admin.nhap.index') }}" class="btn btn-secondary">
            ← Quay lại
        </a>
    </div>

    <!-- Thông tin phiếu nhập -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <div class="row mb-2">
                <div class="col-md-4">
                    <strong>Mã phiếu:</strong> {{ $receipt->receiptCode }}
                </div>
                <div class="col-md-4">
                    <strong>Nhà cung cấp:</strong> {{ $receipt->supplier }}
                </div>
                <div class="col-md-4">
                    <strong>Ngày nhập:</strong>
                    {{ $receipt->created_at->format('d/m/Y H:i') }}
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-4">
                    <strong>Trạng thái:</strong>
                    @if($receipt->status == 'pending')
                        <span class="badge bg-warning text-dark">Chờ duyệt</span>
                    @elseif($receipt->status == 'completed')
                        <span class="badge bg-success">Đã duyệt</span>
                    @else
                        <span class="badge bg-secondary">Hủy</span>
                    @endif
                </div>

                <div class="col-md-8">
                    <strong>Ghi chú:</strong>
                    {{ $receipt->note ?? 'Không có' }}
                </div>
            </div>
        </div>
    </div>

    <!-- Danh sách sản phẩm nhập -->
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <strong>📦 Danh sách sản phẩm nhập</strong>
        </div>

        <div class="card-body p-0">
            <table class="table table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($receipt->details as $index => $detail)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                {{ $detail->product->NAME ?? 'N/A' }}
                            </td>
                            <td>{{ $detail->quantity }}</td>
                            <td>
                                {{ number_format($detail->price, 0, ',', '.') }} đ
                            </td>
                            <td>
                                {{ number_format($detail->quantity * $detail->price, 0, ',', '.') }} đ
                            </td>
                        </tr>
                    @endforeach
                </tbody>

                <tfoot>
                    <tr>
                        <th colspan="4" class="text-end">Tổng tiền:</th>
                        <th class="text-danger">
                            {{ number_format($receipt->totals, 0, ',', '.') }} đ
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Nút duyệt -->
    @if($receipt->status == 'pending')
        <div class="mt-4">
            <form action="{{ route('admin.nhap.update', $receipt->id) }}"
                  method="POST"
                  onsubmit="return confirm('Bạn có chắc muốn duyệt phiếu nhập này?')">
                @csrf
                @method('PUT')
                <button class="btn btn-success">
                    ✔ Duyệt phiếu nhập kho
                </button>
            </form>
        </div>
    @endif

</div>
@endsection

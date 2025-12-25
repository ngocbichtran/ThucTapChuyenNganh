@extends('layout/home')

@section('title', 'Danh sách phiếu xuất kho')

@section('body')

<style>
    .badge-soft-warning {
        background: rgba(255,193,7,.15);
        color: #ffc107;
    }
    .badge-soft-success {
        background: rgba(25,135,84,.15);
        color: #198754;
    }
    .badge-soft-secondary {
        background: rgba(108,117,125,.15);
        color: #6c757d;
    }
</style>

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="fw-bold mb-1">Danh sách phiếu xuất kho</h5>
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item">Kho</li>
                <li class="breadcrumb-item active">Phiếu xuất</li>
            </ol>
        </div>

        <a href="{{ route('admin.xuat.create') }}"
           class="btn btn-primary rounded-pill px-4">
            <i class="bi bi-plus-lg me-1"></i> Tạo phiếu xuất
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-0">

            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">

                    <thead class="table-light text-center">
                        <tr>
                            <th width="60">STT</th>
                            <th class="text-start">Khách hàng</th>
                            <th width="180">Ngày xuất</th>
                            <th width="160">Tổng tiền</th>
                            <th width="140">Trạng thái</th>
                            <th width="160">Thao tác</th>
                        </tr>
                    </thead>

                    <tbody class="text-center">
                        @forelse($receipts as $index => $receipt)
                            <tr>
                                <td>{{ $index + 1 }}</td>

                                <td class="text-start fw-semibold">
                                    {{ $receipt->customer ?? '—' }}
                                </td>

                                <td>
                                    {{ $receipt->created_at->format('d/m/Y H:i') }}
                                </td>

                                <td class="fw-bold text-danger">
                                    {{ number_format($receipt->totals, 0, ',', '.') }} đ
                                </td>

                                <td>
                                    @if($receipt->status == 'pending')
                                        <span class="badge badge-soft-warning">
                                            Chờ duyệt
                                        </span>
                                    @elseif($receipt->status == 'completed')
                                        <span class="badge badge-soft-success">
                                            Đã duyệt
                                        </span>
                                    @else
                                        <span class="badge badge-soft-secondary">
                                            Hủy
                                        </span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ route('admin.xuat.show', $receipt->id) }}"
                                       class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                        Chi tiết
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-muted py-4">
                                    Chưa có phiếu xuất nào
                                </td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
            </div>

        </div>
    </div>

</div>
@endsection

@extends('layout/home')

@section('title', 'Danh sách phiếu nhập kho')

@section('body')
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="fw-bold mb-1">Danh sách phiếu nhập kho</h5>
            <ol class="breadcrumb mb-0 small">
                <li class="breadcrumb-item">Kho</li>
                <li class="breadcrumb-item active">Phiếu nhập</li>
            </ol>
        </div>

        <a href="{{ route('admin.nhap.create') }}"
           class="btn btn-primary rounded-pill px-4">
            <i class="bi bi-plus-lg me-1"></i> Tạo phiếu nhập
        </a>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-0">

            <table class="table align-middle table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th >STT</th>
                        <th>Nhà cung cấp</th>
                        <th >Ngày nhập</th>
                        <th  class="text-end">Tổng tiền</th>
                        <th >Trạng thái</th>
                        <th  class="text-center">Thao tác</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($receipts as $index => $receipt)
                        <tr>
                            <td class="text-muted">{{ $index + 1 }}</td>

                            <td class="fw-semibold">
                                {{ $receipt->supplier }}
                            </td>

                            <td>
                                {{ $receipt->created_at->format('d/m/Y H:i') }}
                            </td>

                            <td class="text-end fw-semibold text-danger">
                                {{ number_format($receipt->totals, 0, ',', '.') }} đ
                            </td>

                            <td>
                                @if($receipt->status == 'pending')
                                    <span class="badge bg-warning text-dark rounded-pill px-3 py-2">
                                        Chờ duyệt
                                    </span>
                                @elseif($receipt->status == 'completed')
                                    <span class="badge bg-success rounded-pill px-3 py-2">
                                        Đã duyệt
                                    </span>
                                @else
                                    <span class="badge bg-secondary rounded-pill px-3 py-2">
                                        Đã hủy
                                    </span>
                                @endif
                            </td>

                            <td class="text-center">
                                <a href="{{ route('admin.nhap.show', $receipt->id) }}"
                                   class="btn btn-sm btn-outline-primary rounded-pill px-3">
                                    Chi tiết
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                Chưa có phiếu nhập nào
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection

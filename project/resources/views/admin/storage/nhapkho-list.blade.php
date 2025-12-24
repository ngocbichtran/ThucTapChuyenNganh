@extends('layout/home')

@section('title', 'Danh sách phiếu nhập kho')

@section('body')
<div class="container-fluid">

    <!-- Page title -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">📦 Danh sách phiếu nhập kho</h4>
        <a href="{{ route('admin.nhap.create') }}" class="btn btn-primary">
            + Tạo phiếu nhập
        </a>
    </div>

    <!-- Table -->
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nhà cung cấp</th>
                        <th>Ngày nhập</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th width="180">Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($receipts as $index => $receipt)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            <td>{{ $receipt->supplier }}</td>

                            <td>
                                {{ $receipt->created_at->format('d/m/Y H:i') }}
                            </td>

                            <td>
                                {{$receipt->totals }} đ
                            </td>

                            <td>
                                @if($receipt->status == 'pending')
                                    <span class="badge bg-warning text-dark">Chờ duyệt</span>
                                @elseif($receipt->status == 'completed')
                                    <span class="badge bg-success">Đã duyệt</span>
                                @else
                                    <span class="badge bg-secondary">Hủy</span>
                                @endif
                            </td>

                            <td>
                               <a href="{{ route('admin.nhap.show', $receipt->id) }}"
                                class="btn btn-sm btn-info">
                                    Chi tiết
                               </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-muted">
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

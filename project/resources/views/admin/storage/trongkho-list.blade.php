@extends('layout/home')

@section('title', 'Quản lý tồn kho')

@section('body')
<div class="container-fluid">

    <div class="page-header mb-4">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h5 class="mb-0">Quản lý tồn kho</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-0">

            <table class="table align-middle table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th width="60">STT</th>
                        <th>Sản phẩm</th>
                        <th width="160">Giá bán</th>
                        <th width="120" class="text-center">Tồn kho</th>
                        <th width="140" class="text-center">Trạng thái</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($products as $index => $product)
                        <tr>
                            <td class="text-muted">{{ $index + 1 }}</td>

                            <td class="fw-semibold">
                                {{ $product->NAME }}
                            </td>

                            <td class="fw-semibold text-danger">
                                {{ number_format($product->PRICE, 0, ',', '.') }} đ
                            </td>

                            <td class="text-center fw-bold">
                                {{ $product->STOCK }}
                            </td>

                            <td class="text-center">
                                @if($product->STOCK == 0)
                                    <span class="badge bg-danger rounded-pill px-3 py-2">
                                        Hết hàng
                                    </span>
                                @elseif($product->STOCK < 5)
                                    <span class="badge bg-warning text-dark rounded-pill px-3 py-2">
                                        Sắp hết
                                    </span>
                                @else
                                    <span class="badge bg-success rounded-pill px-3 py-2">
                                        Còn hàng
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                Không có dữ liệu tồn kho
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>
@endsection

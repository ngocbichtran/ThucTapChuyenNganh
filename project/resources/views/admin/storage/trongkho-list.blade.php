@extends('layout/home')

@section('title', 'Quản lý tồn kho')

@section('body')
<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">📦 Quản lý tồn kho</h4>
    </div>

    <!-- Bộ lọc -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <form method="GET" class="row g-3">
                <div class="col-md-4">
                    <input type="text"
                           name="keyword"
                           value="{{ request('keyword') }}"
                           class="form-control"
                           placeholder="🔍 Tìm tên sản phẩm...">
                </div>

                <div class="col-md-3">
                    <select name="stock" class="form-select">
                        <option value="">-- Tình trạng kho --</option>
                        <option value="low" {{ request('stock')=='low' ? 'selected' : '' }}>
                            Sắp hết hàng
                        </option>
                        <option value="out" {{ request('stock')=='out' ? 'selected' : '' }}>
                            Hết hàng
                        </option>
                    </select>
                </div>

                <div class="col-md-2">
                    <button class="btn btn-primary w-100">
                        Lọc
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Bảng tồn kho -->
    <div class="card shadow-sm">
        <div class="card-header bg-white">
            <strong>📋 Danh sách tồn kho</strong>
        </div>

        <div class="card-body p-0">
            <table class="table table-bordered table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Sản phẩm</th>
                        <th>Giá bán</th>
                        <th>Tồn kho</th>
                        <th>Trạng thái</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($products as $index => $product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $product->NAME }}</td>
                            <td>{{ number_format($product->PRICE, 0, ',', '.') }} đ</td>
                            <td class="text-center">{{ $product->STOCK }}</td>
                            <td class="text-center">
                                @if($product->STOCK == 0)
                                    <span class="badge bg-danger">Hết hàng</span>
                                @elseif($product->STOCK < 5)
                                    <span class="badge bg-warning text-dark">Sắp hết</span>
                                @else
                                    <span class="badge bg-success">Còn hàng</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
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

@extends('layout/home')

@section('title','Tạo phiếu xuất kho')

@section('body')
<div class="container-fluid">

    @if ($errors->any())
        <div class="alert alert-danger rounded-3">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.xuat.store') }}" method="POST">
        @csrf

   <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body">
                <h4 class="fw-bold mb-3 ">Thông tin phiếu xuất</h4>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Khách hàng</label>
                        <input type="text"
                               name="customer"
                               class="form-control rounded-pill"
                               placeholder="Nhập tên khách hàng"
                               required>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label class="form-label">Ghi chú</label>
                        <input type="text"
                               name="note"
                               class="form-control rounded-pill"
                               placeholder="Ghi chú thêm (nếu có)">
                    </div>
                </div>
            </div>
        </div>

        <div class="card border-0 shadow-sm rounded-4 mb-4">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="fw-bold mb-0">Danh sách sản phẩm xuất</h6>

                    <button type="button"
                            class="btn btn-outline-primary rounded-pill px-4"
                            id="addRow">
                        + Thêm sản phẩm
                    </button>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0" id="productTable">
                        <thead class="table-light text-center">
                            <tr>
                                <th>Sản phẩm</th>
                                <th width="120">Số lượng</th>
                                <th width="150">Giá xuất</th>
                                <th width="60"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <select name="products[0][product_id]"
                                            class="form-select rounded-pill"
                                            required>
                                        <option value="" selected disabled>
                                            -- Chọn sản phẩm --
                                        </option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->ID }}"
                                                    data-stock="{{ optional($product->inventory)->quantity ?? 0 }}">
                                                {{ $product->NAME }}
                                                (Tồn: {{ optional($product->inventory)->quantity ?? 0 }})
                                            </option>
                                        @endforeach
                                    </select>
                                </td>

                                <td>
                                    <input type="number"
                                           name="products[0][quantity]"
                                           class="form-control rounded-pill text-center"
                                           min="1"
                                           required>
                                </td>

                                <td>
                                    <input type="number"
                                           name="products[0][price]"
                                           class="form-control rounded-pill text-end"
                                           min="0"
                                           step="0.01"
                                           required>
                                </td>

                                <td class="text-center">
                                    <button type="button"
                                            class="btn btn-outline-danger btn-sm rounded-circle remove-row">
                                        ✕
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>

       <div class="d-flex justify-content-between align-items-center">
             <a href="{{ route('admin.xuat.index') }}"
       class="btn btn-outline-secondary rounded-pill px-4">
        <i class="bi bi-arrow-left"></i> Quay lại
    </a>
            <button type="submit"
                    class="btn btn-success rounded-pill px-5">
                Lưu phiếu xuất
            </button>
        </div>

    </form>
</div>
@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    let rowIndex = 1;
    const productTable = document.querySelector('#productTable tbody');
    const addRowBtn = document.getElementById('addRow');

    addRowBtn.addEventListener('click', function () {
        const newRow = document.createElement('tr');

        newRow.innerHTML = `
            <td>
                <select name="products[${rowIndex}][product_id]"
                        class="form-select rounded-pill"
                        required>
                    <option value="" selected disabled>-- Chọn sản phẩm --</option>
                    @foreach($products as $product)
                        <option value="{{ $product->ID }}"
                                data-stock="{{ optional($product->inventory)->quantity ?? 0 }}">
                            {{ $product->NAME }}
                            (Tồn: {{ optional($product->inventory)->quantity ?? 0 }})
                        </option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="number"
                       name="products[${rowIndex}][quantity]"
                       class="form-control rounded-pill text-center"
                       min="1"
                       required>
            </td>
            <td>
                <input type="number"
                       name="products[${rowIndex}][price]"
                       class="form-control rounded-pill text-end"
                       min="0"
                       step="0.01"
                       required>
            </td>
            <td class="text-center">
                <button type="button"
                        class="btn btn-outline-danger btn-sm rounded-circle remove-row">
                    ✕
                </button>
            </td>
        `;
        productTable.appendChild(newRow);
        rowIndex++;
    });

    productTable.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-row')) {
            if (productTable.rows.length === 1) {
                alert('Phải có ít nhất 1 sản phẩm!');
                return;
            }
            e.target.closest('tr').remove();
        }
    });
});

// Giới hạn số lượng theo tồn kho
document.addEventListener('change', function(e) {
    if (e.target.tagName === 'SELECT' && e.target.name.includes('[product_id]')) {
        const stock = e.target.selectedOptions[0].dataset.stock || 0;
        const qtyInput = e.target.closest('tr')
            .querySelector('input[name*="[quantity]"]');
        qtyInput.max = stock;
    }
});
</script>
@endsection

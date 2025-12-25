@extends('layout/home')

@section('body')
<div class="container">
    <h4 class="mb-3">Tạo phiếu xuất kho</h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.xuat.store') }}" method="POST">
        @csrf

        <!-- Thông tin chung -->
        <div class="card mb-3">
            <div class="card-body">
                <div class="mb-3">
                    <label>Khách hàng</label>
                    <input type="text" name="customer" class="form-control" required>

                </div>

                <div class="mb-3">
                    <label>Ghi chú</label>
                    <textarea name="note" class="form-control"></textarea>
                </div>
            </div>
        </div>

        <!-- Danh sách sản phẩm -->
        <div class="card">
            <div class="card-body">
                <h6>Sản phẩm nhập</h6>

                <table class="table table-bordered" id="productTable">
                    <thead>
                        <tr>
                            <th>Sản phẩm</th>
                            <th width="120">Số lượng</th>
                            <th width="150">Giá xuát</th>
                            <th width="50"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <select name="products[0][product_id]" class="form-control" required>
                                    <option value="" selected disabled>-- Chọn sản phẩm --</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->ID }}"
                                                data-stock="{{ optional($product->inventory)->quantity ?? 0 }}">
                                            {{ $product->NAME }} (Tồn: {{ optional($product->inventory)->quantity ?? 0 }})
                                        </option>

                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <input type="number" name="products[0][quantity]" class="form-control" min="1" required>
                            </td>
                            <td>
                                <input type="number" name="products[0][price]" class="form-control" min="0" step="0.01" required>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-danger btn-sm remove-row">×</button>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <button type="button" class="btn btn-outline-primary" id="addRow">
                    + Thêm sản phẩm
                </button>
            </div>
        </div>

        <div class="mt-3 text-end">
            <button type="submit" class="btn btn-success">
                Lưu phiếu xuát
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
                <select name="products[${rowIndex}][product_id]" class="form-control" required>
                    <option value="" selected disabled>-- Chọn sản phẩm --</option>
                    @foreach($products as $product)
                        <option value="{{ $product->ID }}">{{ $product->NAME }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="number" name="products[${rowIndex}][quantity]"
                       class="form-control" min="1" required>
            </td>
            <td>
                <input type="number" name="products[${rowIndex}][price]"
                       class="form-control" min="0" step="0.01" required>
            </td>
            <td class="text-center">
                <button type="button" class="btn btn-danger btn-sm remove-row">×</button>
            </td>
        `;

        productTable.appendChild(newRow);
        rowIndex++;
    });

    // Xóa dòng
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
document.addEventListener('change', function(e) {
    if (e.target.tagName === 'SELECT') {
        const stock = e.target.selectedOptions[0].dataset.stock;
        const qtyInput = e.target.closest('tr').querySelector('input[name*="[quantity]"]');
        qtyInput.max = stock;
    }
});

</script>

@endsection

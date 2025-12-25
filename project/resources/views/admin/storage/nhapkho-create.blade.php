@extends('layout/home')

@section('body')

<style>
    .table td, .table th {
        vertical-align: middle;
    }

    .remove-row {
        border-radius: 50%;
        width: 32px;
        height: 32px;
        padding: 0;
        line-height: 1;
    }
</style>

<form action="{{ route('admin.nhap.store') }}" method="POST">
    @csrf
    @if ($errors->any())
        <div class="alert alert-danger rounded-3">
            <ul class="mb-0 ps-3">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <h4 class="fw-bold mb-3 ">Thông tin phiếu nhập</h4>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Nhà cung cấp</label>
                    <input type="text"
                           name="supplier"
                           class="form-control"
                           placeholder="Nhập tên nhà cung cấp"
                           required>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-semibold">Ghi chú</label>
                    <textarea name="note"
                              class="form-control"
                              rows="2"
                              placeholder="Ghi chú thêm (nếu có)"></textarea>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-header bg-white border-0 fw-semibold d-flex justify-content-between align-items-center">
            <span>Sản phẩm nhập</span>

            <button type="button"
                    class="btn btn-outline-primary rounded-pill px-4"
                    id="addRow">
                <i class="bi bi-plus-lg"></i> Thêm sản phẩm
            </button>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="productTable">
                    <thead class="table-light text-center">
                        <tr>
                            <th>Sản phẩm</th>
                            <th width="140">Số lượng</th>
                            <th width="180">Giá nhập</th>
                            <th width="70"></th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>
                                <select name="products[0][product_id]"
                                        class="form-select"
                                        required>
                                    <option value="" disabled selected>-- Chọn sản phẩm --</option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->ID }}">
                                            {{ $product->NAME }}
                                        </option>
                                    @endforeach
                                </select>
                            </td>

                            <td>
                                <input type="number"
                                       name="products[0][quantity]"
                                       class="form-control"
                                       min="1"
                                       required>
                            </td>

                            <td>
                                <input type="number"
                                       name="products[0][price]"
                                       class="form-control"
                                       min="0"
                                       step="0.01"
                                       required>
                            </td>

                            <td class="text-center">
                                <button type="button"
                                        class="btn btn-outline-danger btn-sm remove-row">
                                    <i class="bi bi-x-lg"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center">
        <a href="{{ route('admin.nhap.index') }}"
       class="btn btn-outline-secondary rounded-pill px-4">
        <i class="bi bi-arrow-left"></i> Quay lại
    </a>
        <button type="submit"
                class="btn btn-success rounded-pill px-5">
            <i class="bi bi-save"></i> Lưu phiếu nhập
        </button>
    </div>

</form>
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
                        class="form-select"
                        required>
                    <option value="" disabled selected>-- Chọn sản phẩm --</option>
                    @foreach($products as $product)
                        <option value="{{ $product->ID }}">{{ $product->NAME }}</option>
                    @endforeach
                </select>
            </td>
            <td>
                <input type="number"
                       name="products[${rowIndex}][quantity]"
                       class="form-control"
                       min="1"
                       required>
            </td>
            <td>
                <input type="number"
                       name="products[${rowIndex}][price]"
                       class="form-control"
                       min="0"
                       step="0.01"
                       required>
            </td>
            <td class="text-center">
                <button type="button"
                        class="btn btn-outline-danger btn-sm remove-row">
                    <i class="bi bi-x-lg"></i>
                </button>
            </td>
        `;

        productTable.appendChild(newRow);
        rowIndex++;
    });

    productTable.addEventListener('click', function (e) {
        if (e.target.closest('.remove-row')) {
            if (productTable.rows.length === 1) {
                alert('Phải có ít nhất 1 sản phẩm!');
                return;
            }
            e.target.closest('tr').remove();
        }
    });
});
</script>
@endsection

@extends('layout/home')
@section('body')
<div style="margin-bottom: 15px; width: 100%; display: flex; justify-content: flex-start;"> 
        <a href="{{ route('product.create') }}"
        class="btn btn-success btn-app btn-xs"
        style="min-width: 60px; margin-top:80px; margin-left:280px;">
            <i class="fa fa-plus"></i><br>
            Add
        </a>
</div>

    <div class="container" style="margin-right:0px; margin-left:200px;">
        <div class=" text-center rounded p-4">
            <div class="table-responsive" style="display: flex; justify-content: center; margin-top:50px;">
                <table class="table table-bordered table-hover text-center align-middle mb-0" style="width: 100%; margin: 0;
                margin-left: 5%; table-layout: fixed;border-collapse: collapse;border-color:black;">
                    <thead style="text-align: center;">
                    <tr class="text-white">
                        <th scope="col" style="width: 6%; word-break: break-word;">ID</th>
                        <th scope="col" style="width: 10%; word-break: break-word;">ID Loại</th>
                        <th scope="col" style="width: 12%; word-break: break-word;">Tên sản phẩm</th>
                        <th scope="col" style="width: 30%;">Mô tả</th>
                        <th scope="col" style="width: 20%;">Ảnh sản phẩm</th>
                        <th scope="col" style="width: 10%;">Trạng Thái</th>
                        <th scope="col" style="width: 10%;">Ngày Tạo</th>
                        <th scope="col" style="width: 15%;">Hành Động</th>
                    </tr>

                    </thead>
                     <tbody>
                       <tbody>
                            @foreach ($product as $product)
                                <tr>
                                    <td>{{ $product->ID }}</td>
                                    <td>{{ $product->CATE_ID }}</td>
                                    <td>{{ $product->NAME }}</td>
                                    <td>{{ $product->DESCRIPTION }}</td>
                                    <td>
                                        <img src="{{ asset($product->IMG_URL) }}" alt="{{ $product->NAME }}" width="80">
                                    </td>
                                    <td>
                                        @if($product->ACTIVE_FLAG == 1)
                                            <span class="badge bg-success">Đã bày bán</span>
                                        @else
                                            <span class="badge bg-secondary">Chưa bày bán</span>
                                        @endif
                                    </td>
                                    <td>{{ $product->CREATE_DATE ? \Carbon\Carbon::parse($product->CREATE_DATE)->format('d/m/Y') : '-' }}</td>
                                    <td>
                                        <a href="{{ route('product.edit', $product->ID) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('product.destroy', $product->ID) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                </table>
            </div>
        </div>
</div>
@endsection
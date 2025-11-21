@extends('layout/home')
@section('body')
<div style="margin-bottom: 15px; margin-left: 5%; width: 100%; display: flex; justify-content: flex-start;">
        <button type="button" class="btn btn-default btn-app btn-xs" style="min-width: 60px;
        margin-top:80px;background-color:green;margin-left:220px;">
            <i class="fa fa-plus"></i><br>
            Add
        </button>
    </div>
    <!-- <div class="container" style="margin-right:0px; margin-left:475px;  padding-top: 0px;padding-bottom: 0px;">
        <form class="form-inline" style="max-width: 400px; margin-left:200px;margin-right:0px;">
            <div class="form-group mb-3 d-flex align-items-center">
                <label for="id" style="width: 80px;">ID</label>
                <input type="text" id="id" name="id" class="form-control" style="flex: 1;">
            </div>
            <div class="form-group mb-3 d-flex align-items-center">
                <label for="code" style="width: 80px;">Code</label>
                <input type="text" id="code" name="code" class="form-control" style="flex: 1;">
            </div>
            <div class="form-group mb-3 d-flex align-items-center">
                <label for="name" style="width: 80px;">Name</label>
                <input type="text" id="name" name="name" class="form-control" style="flex: 1;">
            </div>
            <div class="text-start">
                <button type="submit" class="btn btn-success">Search</button>
            </div>
        </form>
    </div> -->

    <div class="container" style="margin-right:0px; margin-left:200px;">
        <div class=" text-center rounded p-4">

            <div class="table-responsive" style="display: flex; justify-content: center; margin-top:50px;">
                <table class="table table-bordered table-hover text-center align-middle mb-0" style="width: 100%; margin: 0;
                margin-left: 5%; table-layout: fixed;border-collapse: collapse;border-color:black;">
                    <thead style="text-align: center;">
                    <tr class="text-white">
                        <th scope="col" style="width: 5%; word-break: break-word;">STT</th>
                        <th scope="col" style="width: 5%; word-break: break-word;">ID</th>
                        <th scope="col" style="width: 10%; word-break: break-word;">Loại</th>
                        <th scope="col" style="width: 12%; word-break: break-word;">Tên sản phẩm</th>
                        <th scope="col" style="width: 43%;">Mô tả</th>
                        <th scope="col" style="width: 15%; word-break: break-word;">Chỉnh sửa</th>
                    </tr>
                    </thead>
                     <tbody>
                        @foreach ($products as $product)
                        <tr>
                            <td>{{ $product->ID }}</td>
                            <td>{{ $product->CATE_ID }}</td>
                            <td>{{ $product->TYPE }}</td>
                            <td>{{ $product->NAME }}</td>
                            <td>{{ $product->DESCRIPTION }}</td>
                            <td>{{ $product->IMG_URL }}</td>
                            <td>{{ $product->ACTIVE_FLAG == 1 ? 'Đã bày bán' : 'Chưa bày bán' }}</td>
                            <td>{{ \Carbon\Carbon::parse($product->CREATE_DATE)->format('d/m/Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
</div>
@endsection
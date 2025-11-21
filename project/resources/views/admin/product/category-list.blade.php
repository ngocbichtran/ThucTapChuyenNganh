@extends('layout/home')
@section('body')
 <div class="container" style="margin-right:0px; margin-left:200px;">
        <div class=" text-center rounded p-4">

            <div style="margin-bottom: 15px; margin-left: 5%; width: 100%; display: flex; justify-content: flex-start;">
                <button type="button" class="btn btn-default btn-app btn-xs" style="min-width: 60px; margin-top:60px;background-color:green;">
                    <i class="fa fa-plus"></i><br>
                   Add
                </button>
            </div>

            <div class="table-responsive" style="display: flex; justify-content: center; margin-top:50px;">
                <table class="table table-bordered table-hover text-center align-middle mb-0" style="width: 100%; margin: 0;
            margin-left: 5%; table-layout: fixed;border-collapse: collapse;border-color:black;">
                    <thead style="text-align: center;">
                    <tr class="text-white">
                        <th scope="col" style="width: 6%; word-break: break-word;">ID</th>
                        <th scope="col" style="width: 10%; word-break: break-word;">Tên Loại</th>
                        <th scope="col" style="width: 43%; word-break: break-word;">Mô tả</th>
                        <th scope="col" style="width: 20%; word-break: break-word;">Trạng Thái</th>
                        <th scope="col" style="width: 43%; word-break: break-word;">Ngày Tạo</th>
                       
                    </tr>
                    </thead>
                   <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->ID }}</td>
                            <td>{{ $category->TYPE }}</td>
                            <td>{{ $category->DESCRIPTION }}</td>
                            <td>{{ $category->ACTIVE_FLAG == 1 ? 'Đã bày bán' : 'Chưa bày bán' }}</td>
                            <td>{{ \Carbon\Carbon::parse($category->CREATE_DATE)->format('d/m/Y') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
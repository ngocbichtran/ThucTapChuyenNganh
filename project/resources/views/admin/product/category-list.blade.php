@extends('layout/home')
@section('body')
<div style="display: flex; align-items: center; margin-bottom: 15px;">

    <!-- Nút Add -->
    <a href="{{ route('category.create') }}"
       class="btn btn-success btn-app btn-xs"
       style="margin-top:80px; margin-left:280px;">
        <i class="fa fa-plus"></i><br>
        Add
    </a>

    <!-- Thông báo -->
    <div style="margin-top:80px; margin-left:50px;">
        @if(session('success'))
            <div class="alert alert-success" style="margin:0;">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger" style="margin:0;">
                {{ session('error') }}
            </div>
        @endif
    </div>

</div>

    <div class="container" style="margin-right:0px; margin-left:200px;">
            <div class="table-responsive" style="display: flex; justify-content: center; margin-top:50px;">
                <table class="table table-bordered table-hover text-center align-middle mb-0" style="width: 100%; margin: 0;
            margin-left: 5%; table-layout: fixed;border-collapse: collapse;border-color:black;">
                    <thead style="text-align: center;">
                    <tr class="text-white">
                        <th scope="col" style="width: 6%; word-break: break-word;">ID</th>
                        <th scope="col" style="width: 20%; word-break: break-word;">Tên Loại</th>
                        <th scope="col" style="width: 43%; word-break: break-word;">Mô tả</th>
                        <th scope="col" style="width: 15%; word-break: break-word;">Trạng Thái</th>
                        <th scope="col" style="width: 15%; word-break: break-word;">Ngày Tạo</th>
                         <th scope="col" style="width: 20%;">Hành Động</th>
                       
                    </tr>
                    </thead>
                   <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->ID }}</td>
                            <td>{{ $category->TYPE }}</td>
                            <td>{{ $category->DESCRIPTION }}</td>
                            <td>{{ $category->ACTIVE_FLAG == 1 ? 'Đã bày bán' : 'Chưa bày bán' }}</td>
                            <td>{{ $category->CREATE_DATE ? \Carbon\Carbon::parse($category->CREATE_DATE)->format('d/m/Y') : '-' }}</td>
                                    <td>
                                        <a href="{{ route('category.edit', $category->ID) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('category.destroy', $category->ID) }}" method="POST" style="display:inline-block;">
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
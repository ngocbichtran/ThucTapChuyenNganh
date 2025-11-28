@extends('layout/home')
@section('body')
<div style="margin-bottom: 15px; width: 100%; display: flex; justify-content: flex-start;"> 
        <a href="{{ route('user.create') }}"
        class="btn btn-success btn-app btn-xs"
        style="min-width: 60px; margin-top:80px; margin-left:280px;">
            <i class="fa fa-plus"></i><br>
            Add
        </a>
</div>
    <!-- <div class="container" style="margin-right:0px; margin-left:475px;  padding-top: 0px;padding-bottom: 0px;">
        <form class="form-inline" style="max-width: 400px; margin-left:200px;margin-right:0px;">
            <div class="form-group mb-3 d-flex align-items-center">
                <label for="id" style="width: 80px;">Name</label>
                <input type="text" id="id" name="id" class="form-control" style="flex: 1;">
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
                        <th scope="col" style="width: 6%; word-break: break-word;">ID</th>
                        <th scope="col" style="width: 20%; word-break: break-word;">Tên Đăng Nhập</th>
                        <th scope="col" style="width: 40%; ">Email</th>
                        <th scope="col" style="width: 13%; ">Quyền Hạn</th>
                        <th scope="col" style="width: 15%; ">Ngày Tạo</th>
                        <th scope="col" style="width: 15%; ">Hành Động</th>
                    </tr>
                    </thead>
                 <tbody style="word-break: break-all;">
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->ID }}</td>
                            <td>{{ $user->USER_NAME }}</td>
                            <td>{{ $user->EMAIL }}</td>
                            
                             <td>
                                        @if($user->ACTIVE_FLAG == 1)
                                            <span class="badge bg-success">Quyền Admin</span>
                                        @else
                                            <span class="badge bg-secondary">Quyền Thường</span>
                                        @endif
                            </td>
                            <td>{{ $user->CREATE_DATE ? \Carbon\Carbon::parse($user->CREATE_DATE)->format('d/m/Y') : '-' }}</td>
                            <td>
                                        <a href="{{ route('user.edit', $user->ID) }}" class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('user.destroy', $user->ID) }}" method="POST" style="display:inline-block;">
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
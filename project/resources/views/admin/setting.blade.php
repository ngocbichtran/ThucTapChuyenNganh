@extends('layout.home')

@section('body')
<form action="{{ route('setting.update') }}"
      method="POST"
      enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label class="form-label">Tên Admin</label>
        <input type="text"
               name="name_admin"
               class="form-control"
               value="{{ old('name_admin', $setting->name_admin ?? '') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Logo Admin</label>
        <input type="file" name="logo_admin" class="form-control">
    </div>

    <button class="btn btn-primary">Cập nhật</button>
</form>

@endsection
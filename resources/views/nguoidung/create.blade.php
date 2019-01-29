@extends('backend.layouts.index')

@section('title')
Thêm mới người dùng
@endsection
@section('custom-css')
<!-- Các css dành cho thư viện bootstrap-fileinput -->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
@endsection

@section('main-content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{ route('danhsachnguoidung.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="q_ma">Chức vụ</label>
        <select name="q_ma" class="form-control">
            @foreach($danhsachquyen as $quyen)
                @if(old('q_ma') == $quyen->q_ma)
                <option value="{{ $quyen->q_ma }}" selected>{{ $quyen->q_ten }}</option>
                @else
                <option value="{{ $quyen->q_ma }}">{{ $quyen->q_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="nd_taiKhoan">Tài khoản</label>
        <input type="text" class="form-control" id="nd_taiKhoan" name="nd_taiKhoan" value="{{ old('nd_taiKhoan') }}">
    </div>
    <div class="form-group">
        <label for="nd_matKhau">Mật khẩu</label>
        <input type="text" class="form-control" id="nd_matKhau" name="nd_matKhau" value="{{ old('nd_matKhau') }}">
    </div>

    <div class="form-group">
        <label for="nd_hoTen">Họ tên</label>
        <input type="text" class="form-control" id="nd_hoTen" name="nd_hoTen" value="{{ old('nd_hoTen') }}">
    </div>
    <div class="form-group">
        <label for="nd_gioiTinh">Giới tính</label>
    <select name="nd_gioiTinh" class="form-control">
        <option value="1" {{ old('nd_gioiTinh') == 1 ? "selected" : "" }}>Nam</option>
        <option value="2" {{ old('nd_gioiTinh') == 2 ? "selected" : "" }}>Nữ</option>
    </select>
    </div>
    <div class="form-group">
        <label for="nd_email">Email</label>
        <input type="text" class="form-control" id="nd_email" name="nd_email" value="{{ old('nd_email') }}">
    </div>
    <div class="form-group">
        <label for="nd_ngaySinh">Ngày sinh</label>
        <input type="text" class="form-control" id="nd_ngaySinh" name="nd_ngaySinh" value="{{ old('nd_ngaySinh') }}" data-mask-datetime>
    </div>
    <div class="form-group">
        <label for="nd_diaChi">Địa chỉ</label>
        <input type="text" class="form-control" id="nd_diaChi" name="nd_diaChi" value="{{ old('nd_diaChi') }}">
    </div>
    <div class="form-group">
        <label for="nd_dienThoai">Điện thoại<i></i></label>
        <input type="text" class="form-control" id="nd_dienThoai" name="nd_dienThoai" value="{{ old('nd_dienThoai') }}">
    </div>
    
    <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection
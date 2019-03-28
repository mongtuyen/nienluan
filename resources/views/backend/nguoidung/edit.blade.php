@extends('backend.layouts.index')

@section('title')
Hiệu chỉnh thông tin người dùng
@endsection

@section('main-content')
<h3 align="center">HIỆU CHỈNH NGƯỜI DÙNG</h3>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div  class="col-md-6">
<div  class="box box-primary">
  
<form method="post" action="{{ route('danhsachnguoidung.update', ['id' => $nguoidung->nd_ma]) }}" > 
    <div class="box-body">
    <input type="hidden" name="_method" value="PUT" />
    {{ csrf_field() }}
    <div class="form-group">
        <label for="q_ma">Quyền</label>
        <select name="q_ma" class="form-control">
            @foreach($danhsachquyen as $quyen)
                @if($quyen->q_ma == $nguoidung->q_ma)
                <option value="{{ $quyen->q_ma }}" selected>{{ $quyen->q_ten }}</option>
                @else
                <option value="{{ $quyen->q_ma }}">{{ $quyen->q_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="username">Tài khoản</label>
        <input type="text" class="form-control" id="username" name="username" value="{{ old('username', $nguoidung->username) }}">
    </div>
    <div class="form-group">
        <label for="nd_matKhau">Mật khẩu</label>
        <input type="text" class="form-control" id="password" name="password" value="{{ old('password', $nguoidung->password) }}">
    </div>
    <div class="form-group">
        <label for="nd_name">Họ tên</label>
        <input type="text" class="form-control" id="nd_name" name="nd_name" value="{{ old('nd_name', $nguoidung->nd_name) }}">
    </div>
    <label for="nd_gioiTinh">Giới tính</label>
    <select name="nd_gioiTinh">
        <option value="1" {{ old('nd_gioiTinh', $nguoidung->nd_gioiTinh) == 1 ? "selected" : "" }}>Nam</option>
        <option value="2" {{ old('nd_gioiTinh', $nguoidung->nd_gioiTinh) == 2 ? "selected" : "" }}>Nữ</option>
    </select>
    <div class="form-group">
        <label for="nd_email">Email</label>
        <input type="text" class="form-control" id="nd_email" name="nd_email" value="{{ old('nd_email', $nguoidung->nd_email) }}">
    </div>

    <div class="form-group">
        <label for="nd_ngaySinh">Ngày sinh</label>
        <input type="text" class="form-control" id="nd_ngaySinh" name="nd_ngaySinh" value="{{ old('nd_ngaySinh', $nguoidung->nd_ngaySinh) }}" data-mask-datetime>
    </div>
    <div class="form-group">
        <label for="nd_diaChi">Địa chỉ</label>
        <input type="text" class="form-control" id="nd_diaChi" name="nd_diaChi" value="{{ old('nd_diaChi', $nguoidung->nd_diaChi) }}">
    </div>
    <div class="form-group">
        <label for="nd_dienThoai">Điện thoại</label>
        <input type="text" class="form-control" id="nd_dienThoai" name="nd_dienThoai" value="{{ old('nd_dienThoai', $nguoidung->nd_dienThoai) }}" placeholder="Nhập tên">
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
    </div>
</form>
</div></div>
@endsection
@extends('backend.layouts.index')

@section('title')
Hiệu chỉnh thông tin người dùng
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

<form method="post" action="{{ route('danhsachnguoidung.update', ['id' => $nguoidung->nd_ma]) }}" > 
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
        <label for="nd_taiKhoan">Tài khoản</label>
        <input type="text" class="form-control" id="nd_taiKhoan" name="nd_taiKhoan" value="{{ old('nd_taiKhoan', $nguoidung->nd_taiKhoan) }}">
    </div>
    <div class="form-group">
        <label for="nd_matKhau">Mật khẩu</label>
        <input type="text" class="form-control" id="nd_matKhau" name="nd_matKhau" value="{{ old('nd_matKhau', $nguoidung->nd_matKhau) }}">
    </div>
    <div class="form-group">
        <label for="nd_hoTen">Họ tên</label>
        <input type="text" class="form-control" id="nd_hoTen" name="nd_hoTen" value="{{ old('nd_hoTen', $nguoidung->nd_hoTen) }}">
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
</form>
@endsection
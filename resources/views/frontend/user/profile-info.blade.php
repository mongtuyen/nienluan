@extends('frontend.layouts.partials.index1')
@section('title')
Thông tin người dùng
@endsection

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
<h3 align="center">THÔNG TIN TÀI KHOẢN</h3>
<div class="flash-message">
            @foreach (['danger', 'warning', 'success', 'info'] as $msg)
                 @if(Session::has('alert-' . $msg))
                    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
                @endif
            @endforeach
            </div>
            <div class="flash-message">
                @if ($errors->any())
                <div class="alert alert-danger">
                 <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                </ul>
                </div>
                @endif
</div> 

<div  class="col-md-12">
<div  class="box box-primary">
<form method="post" action="{{route('profile.updateProfile')}}" > 
    <div class="box-body">
    <!-- <input type="hidden" name="_method" value="PUT" /> -->
    {{ csrf_field() }}
    <div class="form-group">
        <label for="username"><b>Loại tài khoản:</b> {{  Auth::user()->quyen->q_ten}}</label>
 </div>
    <div class="form-group">
        <label for="username"><b>Tài khoản:</b> {{  Auth::user()->username}}</label>
    </div>
    <div class="form-group">
        <label for="nd_matKhau"><b>Mật khẩu</b></label>
        <input type="text" class="form-control" id="password" name="password" value="{{ Auth::user()->password }}">
    </div>
    <div class="form-group">
        <label for="nd_name"><b>Họ tên</b></label>
        <input type="text" class="form-control" id="nd_name" name="nd_name" value="{{ Auth::user()->nd_name }}">
    </div>
    <label for="nd_gioiTinh"><b>Giới tính</b></label>
    <select name="nd_gioiTinh">
        <option value="1" {{  Auth::user()->nd_gioiTinh == 1 ? "selected" : "" }}>Nam</option>
        <option value="2" {{  Auth::user()->nd_gioiTinh == 2 ? "selected" : "" }}>Nữ</option>
    </select>
    <div class="form-group">
        <label for="nd_email"><b>Email</b></label>
        <input type="text" class="form-control" id="nd_email" name="nd_email" value="{{  Auth::user()->nd_email }}">
    </div>

    <div class="form-group">
        <label for="nd_ngaySinh"><b>Ngày sinh</b></label>
        <input type="text" class="form-control" id="nd_ngaySinh" name="nd_ngaySinh" value="{{  Auth::user()->nd_ngaySinh }}" data-mask-datetime>
    </div>
    <div class="form-group">
        <label for="nd_diaChi"><b>Địa chỉ</b></label>
        <input type="text" class="form-control" id="nd_diaChi" name="nd_diaChi" value="{{  Auth::user()->nd_diaChi }}">
    </div>
    <div class="form-group">
        <label for="nd_dienThoai"><b>Điện thoại</b></label>
        <input type="text" class="form-control" id="nd_dienThoai" name="nd_dienThoai" value="{{  Auth::user()->nd_dienThoai }}" placeholder="Nhập tên">
    </div>
    <button type="submit" class="btn famie-btn mt-4">Lưu</button>
    </div>
</form> <br><br>

</div></div></div></div></div></div>
@endsection

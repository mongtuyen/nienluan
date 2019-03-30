@extends('frontend.layouts.partials.index1')
@section('title')
Đăng ký tài khoản
@endsection
@section('custom-css')
<style type="text/css" media="screen">
.register-section{
	width: 100%;
	height: auto;
	padding-top: 20px;
	padding-bottom: 20px;
	display: inline-table;
	align-items: center;
}
#btnSubmit{
	background: #30caa0;
	color: white;
	width: 200px;
}
.error {color: red;}
.valid {color: #28a745;}
</style>
@endsection
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
			<h2 class="text-center">ĐĂNG KÝ</h2>
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
<div  class="col-md-6">
<div  class="box box-primary">
  
<form method="post" action="dangky">
    <div class="box-body">
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
        <label for="username">Tài khoản</label>
        <input type="text" class="form-control" id="username" name="username" value="{{ old('username') }}">
    </div>
    <div class="form-group">
        <label for="password">Mật khẩu</label>
        <input type="text" class="form-control" id="password" name="password" value="{{ old('password') }}">
    </div>
    <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Nhập lại mật khẩu') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
    <div class="form-group">
        <label for="nd_name">Họ tên</label>
        <input type="text" class="form-control" id="nd_name" name="nd_name" value="{{ old('nd_name') }}">
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
    
    <button type="submit" class="btn famie-btn mt-4">Đăng ký</button>
    </div>
</form>
</div></div></div></div></div></div>
<br><br>
@endsection
@section('custom-script')


@endsection

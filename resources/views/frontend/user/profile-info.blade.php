@extends('frontend.layouts.partials.index')
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
        <label for="username">Tài khoản</label>
        <input type="text" class="form-control" id="username" name="username" value="{{  Auth::user()->username}}">
    </div>
    <div class="form-group">
        <label for="nd_matKhau">Mật khẩu</label>
        <input type="text" class="form-control" id="password" name="password" value="{{ Auth::user()->password }}">
    </div>
    <div class="form-group">
        <label for="nd_name">Họ tên</label>
        <input type="text" class="form-control" id="nd_name" name="nd_name" value="{{ Auth::user()->nd_name }}">
    </div>
    <label for="nd_gioiTinh">Giới tính</label>
    <select name="nd_gioiTinh">
        <option value="1" {{  Auth::user()->nd_gioiTinh == 1 ? "selected" : "" }}>Nam</option>
        <option value="2" {{  Auth::user()->nd_gioiTinh == 2 ? "selected" : "" }}>Nữ</option>
    </select>
    <div class="form-group">
        <label for="nd_email">Email</label>
        <input type="text" class="form-control" id="nd_email" name="nd_email" value="{{  Auth::user()->nd_email }}">
    </div>

    <div class="form-group">
        <label for="nd_ngaySinh">Ngày sinh</label>
        <input type="text" class="form-control" id="nd_ngaySinh" name="nd_ngaySinh" value="{{  Auth::user()->nd_ngaySinh }}" data-mask-datetime>
    </div>
    <div class="form-group">
        <label for="nd_diaChi">Địa chỉ</label>
        <input type="text" class="form-control" id="nd_diaChi" name="nd_diaChi" value="{{  Auth::user()->nd_diaChi }}">
    </div>
    <div class="form-group">
        <label for="nd_dienThoai">Điện thoại</label>
        <input type="text" class="form-control" id="nd_dienThoai" name="nd_dienThoai" value="{{  Auth::user()->nd_dienThoai }}" placeholder="Nhập tên">
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
    </div>
</form> <br><br>

<!-- <form method="post" action="{{ route('profile.updateProfile',['id' => Auth::user()->nd_ma])}}" > 
    <div class="box-body">
    <input type="hidden" name="_method" value="PUT" />
    {{ csrf_field() }}
   
	<div class="form-group">
			<label>Tài khoản</label>
			<input disabled="true" type="text" value="{{Auth::user()->username}}" class="form-control">
		</div>
		<div class="form-group">
			<label>Họ tên</label>
			<input name="name" type="text" value="{{Auth::user()->nd_name}}" class="form-control" >
		</div>
		<div class="form-group">
			<label>Email</label>
			<input name="email" type="email" value="{{Auth::user()->nd_email}}" class="form-control">
		</div>
    <div class="form-group">
        <label for="nd_matKhau">Mật khẩu</label>
        <input type="text" class="form-control" id="password" name="password"  value="{{Auth::user()->password}}">
    </div>
    
    
    <div class="form-group">
        <label for="nd_ngaySinh">Ngày sinh</label>
        <input type="text" class="form-control" id="nd_ngaySinh" name="nd_ngaySinh"  value="{{Auth::user()->nd_ngaySinh}}" data-mask-datetime>
    </div>

	<div class="form-group">
	<label for="nd_gioiTinh">Giới tính</label>
        <select name="nd_gioiTinh" id="nd_gioiTinh" class="form-control">
            <option value="Nam" <?php echo (Auth::user()->nd_gioiTinh == 'Nam') ? 'selected' : '' ?>>Nam</option>
            <option value="Nữ" <?php echo (Auth::user()->nd_gioiTinh == 'Nữ') ? 'selected' : '' ?>>Nữ</option>
     	</select>
    </div>
          
    <div class="form-group">
        <label for="nd_diaChi">Địa chỉ</label>
        <input type="text" class="form-control" id="nd_diaChi" name="nd_diaChi"  value="{{Auth::user()->nd_diaChi}}">
    </div>
    <div class="form-group">
        <label for="nd_dienThoai">Điện thoại</label>
        <input type="text" class="form-control" id="nd_dienThoai" name="nd_dienThoai"  value="{{Auth::user()->nd_dienThoai}}" placeholder="Nhập tên">
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
    </div>
</form> -->
</div></div></div></div></div></div>
@endsection

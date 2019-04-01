@extends('frontend.layouts.partials.index1')
@section('title')
Cập nhật bài đăng
@endsection

@section('main-content')

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.w3-button {width:70px;}
</style>

<h3 align="center">HIỆU CHỈNH BÀI ĐĂNG</h3><div class="container">
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div>

<div  class="col-md-12">
<div  class="box box-primary">
<form method="post" action="{{ route('profile.updatemytin', ['id' => $baidang->bd_ma]) }}" > 
    <input type="hidden" name="_method" value="PUT" />
    <div class="box-body">
    {{ csrf_field() }}
    
    <div class="form-group">
        <label for="status"><b>Trạng thái tin </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <label class="fancy-radio">
            <input name="status" value="2" type="radio" id="close" {{ old('status', $baidang->status)==2 ? "checked" : "" }}>
            <span><i></i>Close</span>
        </label>
        <label class="fancy-radio">
            <input name="status" value="1" type="radio" id="open" {{ old('status', $baidang->status)==1 ? "checked" : "" }}>
                <span><i></i>Open</span>
        </label>
        
    </div>
   
    <div class="form-group">
    <label for="sp_ma"><b>Thuộc sản phẩm:</b> {{$baidang->thuocSanPham->sp_ten}}</label>
    </div>

    <div class="form-group">
        <label for="bd_tieuDe"><b>Tiêu đề:</b> {{$baidang->bd_tieuDe}}</label>
    </div>
    
    @if($baidang->bd_loai==2)
    <div class="form-group">
    <label for="bd_trangThaisp"><b>Trạng thái sản phẩm</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>    
        <label class="fancy-radio">
            <input name="bd_trangThaisp" value="1" type="radio" id="bd_trangThaisp" {{ old('bd_trangThaisp', $baidang->bd_trangThaisp) == 1 ? "checked" : "" }}>
                <span><i></i>Đã thu hoạch</span>
        </label>
        <label class="fancy-radio">
            <input name="bd_trangThaisp" value="2" type="radio" id="bd_trangThaisp" {{ old('bd_trangThaisp', $baidang->bd_trangThaisp) == 2 ? "checked" : "" }}>
            <span><i></i>Chưa thu hoạch</span>
        </label>
    </div>
    @endif
    

    <div class="form-group">
        <label for="bd_ngayHetHan"><b>Ngày hết hạn</b></label>
        <input type="text" class="form-control" id="bd_ngayHetHan" name="bd_ngayHetHan" value="{{ old('bd_ngayHetHan',$baidang->bd_ngayHetHan) }}" data-mask-datetime>
    </div>

    <div class="form-group">
        <label for="bd_khoiLuong"><b>Khối lượng</b></label>
        <input type="number" class="form-control" id="bd_khoiLuong" name="bd_khoiLuong" value="{{ old('bd_khoiLuong', $baidang->bd_khoiLuong) }}">
    </div>
    <div class="form-group">
        <label for="bd_gia"><b>Giá</b></label>
        <input type="number" class="form-control" id="bd_gia" name="bd_gia" value="{{ old('bd_gia', $baidang->bd_gia) }}">
    </div>

    <button type="submit" class="w3-button w3-green">Lưu</button>
</div>
</form></div></div></div>
@if($baidang->bd_loai==2)
<br>
<h3 align="center">DANH SÁCH NGƯỜI TRẢ GIÁ</h3>
<div class="container">
<div  class="col-md-12">
<div  class="box box-primary">

<table class="table table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Người mua</th>   
            <th>Điện thoại</th>                        
            <th>Giá(đ/kg)</th>  
            <th>Khối lượng(kg)</th>         
            <th>Ngày đăng</th>    
            <th>Trạng thái</th>                                      
            <th>Tùy chọn</th>           
        </tr>
    </thead>
    <tbody>
        @foreach($baidang->gia as $i => $g)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $g->nguoidung->nd_name}}</td>
                <td>{{ $g->nguoidung->nd_dienThoai}}</td>
                <td>{{ $g->dg_noiDung}}</td>
                <td>{{ $g->dg_khoiLuong}}</td>
                <td>{{ $g->dg_time }}</td>
                <td> @if($g->dg_trangThai==1)
                    {{'Đang chờ'}}
                    @else
                    {{'Được chọn'}}
                    @endif
                </td>  
  
                <td><form method="post" action="{{ route('capnhatdaugia', ['id' => $g->dg_ma]) }}">
                <input type="hidden" name="_method" value="PUT" />
                        {{ csrf_field() }}
                        
                        <button type="submit" class="w3-button w3-green">Chọn</button></td>
                </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div></div></div>
@else
</form></div></div></div>
<br>
<h3 align="center">Danh sách người liên hệ</h3>
<div  class="col-md-12">
<div  class="box box-primary">
<div class="container">
<table class="table table-bordered">
    <thead>
        <tr>
            <th>STT</th>
            <th>Họ tên</th>
            <th>Địa chỉ</th>              
            <th>Nội dung</th>           
            <th>Ngày đăng</th>                                          
          
            
        </tr>
    </thead>
    <tbody>
        @foreach($baidang->binhLuan as $i => $bl)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $bl->nguoidung->nd_name}}</td>
                <td>{{ $bl->nguoidung->nd_diaChi}}</td>
                <td>{{ $bl->bl_noiDung}}</td>
                <td>{{ $bl->bl_time }}</td>  
               
            </tr>
        @endforeach
    </tbody>
</table>
</div></div><div>
@endif
@endsection
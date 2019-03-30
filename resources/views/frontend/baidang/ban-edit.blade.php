@extends('frontend.layouts.partials.index1')
@section('title')
Cập nhật bài đăng
@endsection

@section('main-content')

<h3 align="center">HIỆU CHỈNH BÀI ĐĂNG</h3>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container">
<div  class="col-md-12">
<div  class="box box-primary">
<form method="post" action="{{ route('profile.updatemytin', ['id' => $baidang->bd_ma]) }}" enctype="multipart/form-data"> 
    <input type="hidden" name="_method" value="PUT" />
    <div class="box-body">
    {{ csrf_field() }}
    
    <div class="form-group">
        <label for="status">Trạng thái tin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
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
    <label for="sp_ma">Thuộc sản phẩm: {{$baidang->thuocSanPham->sp_ten}}</label>
    </div>

    <div class="form-group">
        <label for="bd_tieuDe">Tiêu đề: {{$baidang->bd_tieuDe}}</label>
    </div>
    <div class="form-group">
    <label for="bd_trangThaisp">Trạng thái sản phẩm &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>    
        <label class="fancy-radio">
            <input name="bd_trangThaisp" value="1" type="radio" id="bd_trangThaisp" {{ old('bd_trangThaisp', $baidang->bd_trangThaisp) == 1 ? "checked" : "" }}>
                <span><i></i>Đã thu hoạch</span>
        </label>
        <label class="fancy-radio">
            <input name="bd_trangThaisp" value="2" type="radio" id="bd_trangThaisp" {{ old('bd_trangThaisp', $baidang->bd_trangThaisp) == 2 ? "checked" : "" }}>
            <span><i></i>Chưa thu hoạch</span>
        </label>
    </div>
    
    

    <div class="form-group">
        <label for="bd_ngayHetHan">Ngày hết hạn</label>
        <input type="text" class="form-control" id="bd_ngayHetHan" name="bd_ngayHetHan" value="{{ old('bd_ngayHetHan',$baidang->bd_ngayHetHan) }}" data-mask-datetime>
    </div>

    <div class="form-group">
        <label for="bd_khoiLuong">Khối lượng</label>
        <input type="number" class="form-control" id="bd_khoiLuong" name="bd_khoiLuong" value="{{ old('bd_khoiLuong', $baidang->bd_khoiLuong) }}">
    </div>
    <div class="form-group">
        <label for="bd_gia">Giá</label>
        <input type="number" class="form-control" id="bd_gia" name="bd_gia" value="{{ old('bd_gia', $baidang->bd_gia) }}">
    </div>

    <button type="submit" class="btn famie-btn mt-4">Lưu</button>
</div>
</form></div></div></div>
<h3 align="center">Danh sách</h3>
<div  class="col-md-12">
<div  class="box box-primary">

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Người viết</th>             
            <th>Nội dung</th>           
            <th>Ngày đăng</th>                                          
            <th>Tùy chọn</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($baidang->binhLuan as $bl)
            <tr>
                <td>{{ $bl->bl_ma }}</td>
                <td>{{ $bl->nguoidung->nd_name}}</td>
                <td>{{ $bl->bl_noiDung}}</td>
                <td>{{ $bl->bl_time }}</td>  
                <!-- <td> <a href="admin/comment/xoa/{{$bl->bl_ma}}/{{$baidang->bd_ma}}">Delete</a></td> -->
                <td> <a href="#">Chọn</a></td>
                <td><form method="post" action="#">
                        <input type="hidden" name="_method" value="DELETE" />
                        {{ csrf_field() }}
                        
                        <button type="submit" class="btn btn-danger">Xóa</button></td>
                </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div></div>
@endsection
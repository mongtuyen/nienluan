@extends('backend.layouts.index')

@section('title')
Hiệu chỉnh bài viết
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
<div  class="col-md-12">
<div  class="box box-primary">
<form method="post" action="{{ route('danhsachbaidang.update', ['id' => $baidang->bd_ma]) }}"> 
    <input type="hidden" name="_method" value="PUT" />
    <div class="box-body">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="bd_Mã">Mã</label>
        <input type="text" class="form-control" id="bd_ma" name="bd_ma" value="{{ old('bd_ma', $baidang->bd_ma) }}">
    </div>
    <div class="form-group">
        <label for="bd_loai">Loại tin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <label class="fancy-radio">
            <input name="bd_loai" value="1" type="radio" id="bd_loai" value="{{ old('bd_loai', $baidang->bd_loai) }}" checked>
                <span><i></i>Tin mua</span>
        </label>
        <label class="fancy-radio">
            <input name="bd_loai" value="2" type="radio" id="bd_loai" value="{{ old('bd_loai', $baidang->bd_loai) }}">
            <span><i></i>Tin bán</span>
        </label>
    </div>
    <!-- <div class="form-group">
    <label for="bd_loaiTin">Loại tin</label>
    <select name="bd_loaiTin" class="form-control">
        <option value="1" {{ old('bd_loaiTin', $baidang->bd_loaiTin) == 1 ? "selected" : "" }}>Tin mua</option>
        <option value="2" {{ old('bd_loaiTin', $baidang->bd_loaiTin) == 2 ? "selected" : "" }}>Tin bán</option>
    </select>
    </div> -->
    <div class="form-group">
        <label for="sp_ma">Thuộc sản phẩm</label>
        <select name="sp_ma" class="form-control">
            @foreach($danhsachsanpham as $sanpham)
                @if($sanpham->sp_ma == $sanpham->sp_ma)
                <option value="{{ $sanpham->sp_ma }}" selected>{{ $sanpham->sp_ten }}</option>
                @else
                <option value="{{ $sanpham->sp_ma }}">{{ $sanpham->sp_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="bd_tieuDe">Tiêu đề</label>
        <input type="text" class="form-control" id="bd_tieuDe" name="bd_tieuDe" value="{{ old('bd_tieuDe', $baidang->bd_tieuDe) }}" placeholder="Nhập tiêu đề">
    </div>
    <div class="form-group">
    <label for="bd_trangThaisp">Trạng thái sản phẩm &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>    
        <label class="fancy-radio">
            <input name="bd_trangThaisp" value="1" type="radio" id="bd_trangThaisp" value="{{ old('bd_trangThaisp', $baidang->bd_trangThaisp) }}" checked>
                <span><i></i>Đã thu hoạch</span>
        </label>
        <label class="fancy-radio">
            <input name="bd_trangThaisp" value="2" type="radio" id="bd_trangThaisp" value="{{ old('bd_trangThaisp', $baidang->bd_trangThaisp) }}">
            <span><i></i>Chưa thu hoạch</span>
        </label>
    </div>
    <!-- <div class="form-group">
    <label for="bd_trangThaisp">Trạng thái sản phẩm</label>
    <select name="bd_trangThaisp" class="form-control">
        <option value="1" {{ old('bd_trangThaisp', $baidang->bd_trangThaisp) == 1 ? "selected" : "" }}>Đã thu hoạch</option>
        <option value="2" {{ old('bd_trangThaisp', $baidang->bd_trangThaisp) == 2 ? "selected" : "" }}>Gần thu hoạch</option>
    </select>
    </div> -->
    <div class="form-group">
        <label for="bd_noiDung">Nội dung</label>
        <textarea name ="bd_noiDung" id="bd_noiDung" class="form-control ckeditor" rows="5" required>{{$baidang->bd_noiDung}}</textarea> 
    </div>

    <div class="form-group">
        <label for="nd_ma">Người đăng</label>
        <select name="nd_ma" class="form-control">
            @foreach($danhsachnguoidung as $nguoidung)
                @if($nguoidung->nd_ma == $nguoidung->nd_ma)
                <option value="{{ $nguoidung->nd_ma }}" selected>{{ $nguoidung->nd_hoTen }}</option>
                @else
                <option value="{{ $nguoidung->nd_ma }}">{{ $nguoidung->nd_hoTen }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="bd_ngayDang">Ngày đăng</label>
        <input type="text" class="form-control" id="bd_ngayDang" name="bd_ngayDang" value="{{ old('bd_ngayDang',$baidang->bd_ngayDang) }}" data-mask-datetime>
    </div>

    <div class="form-group">
        <label for="bd_ngayHetHan">Ngày hết hạn</label>
        <input type="text" class="form-control" id="bd_ngayHetHan" name="bd_ngayHetHan" value="{{ old('bd_ngayHetHan',$baidang->bd_ngayHetHan) }}" data-mask-datetime>
    </div>

    <div class="form-group">
        <div class="file-loading">
            <label>Hình đại diện</label>
            <input id="sp_hinh" type="file" name="sp_hinh">
        </div>
    </div>

    <div class="form-group">
        <label for="bd_khoiLuong">Khối lượng</label>
        <input type="text" class="form-control" id="bd_khoiLuong" name="bd_khoiLuong" value="{{ old('bd_khoiLuong', $baidang->bd_khoiLuong) }}">
    </div>
    <div class="form-group">
        <label for="bd_gia">Giá</label>
        <input type="text" class="form-control" id="bd_gia" name="bd_gia" value="{{ old('bd_gia', $baidang->bd_gia) }}">
    </div>

    <button type="submit" class="btn btn-primary">Lưu</button>
</div>
</form></div></div>
@endsection


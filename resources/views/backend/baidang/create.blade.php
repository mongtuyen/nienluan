@extends('backend.layouts.index')

@section('title')
Thêm mới bài viết
@endsection


@section('main-content')
<h3 align="center">THÊM BÀI ĐĂNG</h3>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="post" action="{{ route('danhsachbaidang.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="bd_ma">Mã</label>
        <input type="text" class="form-control" id="bd_ma" name="bd_ma">
    </div>

   
  
    <div class="form-group">
        <label for="bd_loai">Loại tin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <label class="fancy-radio">
            <input name="bd_loai" value="1" type="radio" id="bd_loai" value="{{ old('bd_loai') }}"checked>
                <span><i></i>Tin mua</span>
        </label>
        <label class="fancy-radio">
            <input name="bd_loai" value="2" type="radio" id="bd_loai" value="{{ old('bd_loai') }}">
            <span><i></i>Tin bán</span>
        </label>
    </div>
    <!-- <select name="bd_loaiTin" class="form-control">
        <option value="1" {{ old('bd_loaiTin') == 1 ? "selected" : "" }}>Tin mua</option>
        <option value="2" {{ old('bd_loaiTin') == 2 ? "selected" : "" }}>Tin bán</option>
    </select> -->
    
    <div class="form-group">
        <label for="sp_ma">Thuộc sản phẩm</label>
        <select name="sp_ma" class="form-control" id="sp_ma">
            @foreach($danhsachsanpham as $sanpham)
                @if(old('sp_ma') == $sanpham->sp_ma)
                <option value="{{ $sanpham->sp_ma }}" selected>{{ $sanpham->sp_ten }}</option>
                @else
                <option value="{{ $sanpham->sp_ma }}">{{ $sanpham->sp_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label for="bd_tieuDe">Tiêu đề</label>
        <input type="text" class="form-control" id="bd_tieuDe" name="bd_tieuDe" value="{{ old('bd_tieuDe') }}" required>
    </div>
    <!-- <div class="form-group">
        <label for="bd_trangThaisp">Trạng thái sản phẩm</label>
        <label class ="radio-inline">
            <input name="thuhoach" value="1" checked="" type="radio">Đã thu hoạch  
        </label>
        <label class ="radio-inline">
            <input name="chuathuhoach" value="2" checked="" type="radio">Chưa thu hoạchs
        </label>
    </div> -->
    
    <div class="form-group">
    <label for="bd_trangThaisp">Trạng thái sản phẩm &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>    
        <label class="fancy-radio">
            <input name="bd_trangThaisp" value="1" type="radio" id="bd_trangThaisp" value="{{ old('bd_trangThaisp') }}" checked>
                <span><i></i>Đã thu hoạch</span>
        </label>
        <label class="fancy-radio">
            <input name="bd_trangThaisp" value="2" type="radio" id="bd_trangThaisp" value="{{ old('bd_trangThaisp') }}">
            <span><i></i>Chưa thu hoạch</span>
        </label>
    </div>
    <!-- <select name="bd_trangThaisp" class="form-control">
        <option value="1" {{ old('bd_trangThaisp') == 1 ? "selected" : "" }}>Đã thu hoạch</option>
        <option value="2" {{ old('bd_trangThaisp') == 2 ? "selected" : "" }}>Chưa thu hoạch</option>
    </select> -->
    
    <div class="form-group">
        <label for="bd_noiDung">Nội dung</label>
        <!-- <input type="text" class="form-control" id="bd_noiDung" name="bd_noiDung" value="{{ old('bd_noiDung') }}">
        <textarea required name="sp_moTa" rows="4"  class="ckeditor" id="sp_moTa"></textarea> -->
        <textarea name ="bd_noiDung" id="bd_noiDung" class="form-control ckeditor" rows="5" value="{{ old('bd_noiDung')}}" required></textarea> 
    </div>

    
    <div class="form-group">
        <label for="nd_ma">Người đăng</label>
        <!-- <div class="col-md-5">
			@foreach ($danhsachnguoidung as $nguoidung)
            	<label class="fancy-radio">
					<input name="nd_ma" id="nd_ma" value="{{ $nguoidung->nd_ma }}" type="radio">
					<span><i></i>{{ $nguoidung->nd_ten }}</span>
				</label>
            @endforeach
		</div> -->
        <select name="nd_ma" class="form-control">
            @foreach($danhsachnguoidung as $nguoidung)
                @if(old('nd_ma') == $nguoidung->nd_ma)
                <option value="{{ $nguoidung->nd_ma }}" selected>{{ $nguoidung->nd_hoTen }}</option>
                @else
                <option value="{{ $nguoidung->nd_ma }}">{{ $nguoidung->nd_hoTen }}</option>
                @endif
            @endforeach
        </select>
    </div>

    
    
    
    <div class="form-group">
        <label for="bd_ngayDang">Ngày đăng</label>
        <input type="text" class="form-control" id="bd_ngayDang" name="bd_ngayDang" value="{{ old('bd_ngayDang') }}" data-mask-datetime>
    </div>

    <div class="form-group">
        <label for="bd_ngayHetHan">Ngày hết hạn</label>
        <input type="text" class="form-control" id="bd_ngayHetHan" name="bd_ngayHetHan" value="{{ old('bd_ngayHetHan') }}" data-mask-datetime>
    </div>
    <label>Hình ảnh</label>
    <div class="form-group">
        <div class="file-loading">
              
            <input id="bd_hinh" type="file" name="bd_hinh" value="{{ old('bd_hinh') }}">
        </div>
    </div>
   
    <div class="form-group">
        <label for="bd_khoiLuong">Khối lượng</label>
        <input type="number" class="form-control" id="bd_khoiLuong" name="bd_khoiLuong" value="{{ old('bd_khoiLuong') }}">
    </div>
    <div class="form-group">
        <label for="bd_gia">Giá</label>
        <input type="number" class="form-control" id="bd_gia" name="bd_gia" value="{{ old('bd_gia') }}">
    </div>
    

    
    <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection

@extends('backend.layouts.index')

@section('title')
Thêm mới bài viết
@endsection

@section('custom-css')
<!-- Các css dành cho thư viện bootstrap-fileinput -->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
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

   
    <label for="bd_loai">Loại tin</label>
    <div class="form-group">
        <label class="fancy-radio">
            <input name="bd_loai" value="1" type="radio" id="bd_loai" checked>
                <span><i></i>Tin mua</span>
        </label>
        <label class="fancy-radio">
            <input name="bd_loai" value="2" type="radio" id="bd_loai">
            <span><i></i>Tin bán</span>
        </label>
    
    <!-- <select name="bd_loaiTin" class="form-control">
        <option value="1" {{ old('bd_loaiTin') == 1 ? "selected" : "" }}>Tin mua</option>
        <option value="2" {{ old('bd_loaiTin') == 2 ? "selected" : "" }}>Tin bán</option>
    </select> -->
    </div>
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
        <input type="text" class="form-control" id="bd_tieuDe" name="bd_tieuDe" required>
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
    <label for="bd_trangThaisp">Trạng thái sản phẩm</label>
    <div class="form-group">
        
    <!-- <select name="bd_trangThaisp" class="form-control">
        <option value="1" {{ old('bd_trangThaisp') == 1 ? "selected" : "" }}>Đã thu hoạch</option>
        <option value="2" {{ old('bd_trangThaisp') == 2 ? "selected" : "" }}>Chưa thu hoạch</option>
    </select> -->
    
		<label class="fancy-radio">
            <input name="bd_trangThaisp" value="1" type="radio" id="bd_trangThaisp" checked>
                <span><i></i>Đã thu hoạch</span>
        </label>
        <label class="fancy-radio">
            <input name="bd_trangThaisp" value="2" type="radio" id="bd_trangThaisp">
            <span><i></i>Chưa thu hoạch</span>
        </label>
   

    </div>
    <div class="form-group">
        <label for="bd_noiDung">Nội dung</label>
        <input type="text" class="form-control" id="bd_noiDung" name="bd_noiDung">
    
        <!-- <textarea id="bd_noiDung" class="form-control ckeditor" rows="5"></textarea> -->
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
        <input type="text" class="form-control" id="bd_ngayDang" name="bd_ngayDang" data-mask-datetime>
    </div>

    <div class="form-group">
        <label for="bd_ngayHetHan">Ngày hết hạn</label>
        <input type="text" class="form-control" id="bd_ngayHetHan" name="bd_ngayHetHan" data-mask-datetime>
    </div>
    
    <div class="form-group">
    <label>Hình ảnh</label>
        <div class="file-loading">
            
            <input id="bd_hinh" type="file" name="bd_hinh">
        </div>
    </div>
   
    <div class="form-group">
        <label for="bd_khoiLuong">Khối lượng</label>
        <input type="number" class="form-control" id="bd_khoiLuong" name="bd_khoiLuong">
    </div>
    <div class="form-group">
        <label for="bd_gia">Giá</label>
        <input type="number" class="form-control" id="bd_gia" name="bd_gia">
    </div>
    

    
    <button type="submit" class="btn btn-primary">Lưu</button>
</form>
@endsection

@section('custom-scripts')
<!-- Các script dành cho thư viện bootstrap-fileinput -->
<script src="{{ asset('vendor/bootstrap-fileinput/js/plugins/sortable.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/fileinput.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/js/locales/fr.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
<script src="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.js') }}" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        $("#bd_hinh").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-lg",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false
        });
        
        $("#bd_hinhanhlienquan").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-lg",
            fileType: "any",
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false,
            allowedFileExtensions: ["jpg", "gif", "png", "txt"]
        });
    });
</script>

<!-- Các script dành cho thư viện Mặt nạ nhập liệu InputMask -->
<script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>

<script>
$(document).ready(function(){
    
});
</script>

@endsection
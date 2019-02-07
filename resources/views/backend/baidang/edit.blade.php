@extends('backend.layouts.index')

@section('title')
Hiệu chỉnh bài viết
@endsection

@section('custom-css')
<!-- Các css dành cho thư viện bootstrap-fileinput -->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
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

<form method="post" action="{{ route('danhsachbaidang.update', ['id' => $baidang->bd_ma]) }}"> 
    <input type="hidden" name="_method" value="PUT" />
    {{ csrf_field() }}
    <label for="bd_loaiTin">Loại tin</label>
    <select name="bd_loaiTin" class="form-control">
        <option value="1" {{ old('bd_loaiTin', $baidang->bd_loaiTin) == 1 ? "selected" : "" }}>Tin mua</option>
        <option value="2" {{ old('bd_loaiTin', $baidang->bd_loaiTin) == 2 ? "selected" : "" }}>Tin bán</option>
    </select>
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
        <input type="text" class="form-control" id="bd_tieuDe" name="bd_tieuDe" value="{{ $baidang->bd_tieuDe }}" placeholder="Nhập tiêu đề">
    </div>
    <label for="bd_trangThaisp">Trạng thái sản phẩm</label>
    <select name="bd_trangThaisp" class="form-control">
        <option value="1" {{ old('bd_trangThaisp', $baidang->bd_trangThaisp) == 1 ? "selected" : "" }}>Đã thu hoạch</option>
        <option value="2" {{ old('bd_trangThaisp', $baidang->bd_trangThaisp) == 2 ? "selected" : "" }}>Gần thu hoạch</option>
    </select>
    <div class="form-group">
        <label for="nd_ma">Người đăng</label>
        <select name="nd_ma" class="form-control">
            @foreach($danhsachnguoidung as $nguoidung)
                @if($nguoidung->nd_ma == $nguoidung->nd_ma)
                <option value="{{ $nguoidung->nd_ma }}" selected>{{ $nguoidung->nd_ten }}</option>
                @else
                <option value="{{ $nguoidung->nd_ma }}">{{ $nguoidung->nd_ten }}</option>
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
            <label>Hình ảnh</label>
            <input id="bd_hinh" type="file" name="bd_hinh">
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
        $("#bv_hinh").fileinput({
            theme: 'fas',
            showUpload: false,
            showCaption: false,
            browseClass: "btn btn-primary btn-lg",
            fileType: "any",
            append: false,
            showRemove: false,
            autoReplace: true,
            previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
            overwriteInitial: false,
            initialPreviewShowDelete: false,
            initialPreviewAsData: true,
            initialPreview: [
                "{{ asset('storage/photos/' . $baidang->bd_hinh) }}"
            ],
            initialPreviewConfig: [
                {
                    caption: "{{ $baidang->bd_hinh }}", 
                    size: {{ Storage::exists('public/photos/' . $baidang->bv_hinh) ? Storage::size('public/photos/' . $baidang->bd_hinh) : 0 }}, 
                    width: "120px", 
                    url: "{$url}", 
                    key: 1
                },
            ]
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
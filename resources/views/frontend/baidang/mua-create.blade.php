@extends('frontend.layouts.partials.index1')
@section('title')
Đăng tin mua
@endsection
@section('custom-css')
<!-- Các css dành cho thư viện bootstrap-fileinput -->
<link href="{{ asset('vendor/bootstrap-fileinput/css/fileinput.css') }}" media="all" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="{{ asset('vendor/bootstrap-fileinput/themes/explorer-fas/theme.css') }}" media="all" rel="stylesheet" type="text/css"/>
@endsection
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
<h3 align="center">ĐĂNG TIN MUA</h3>
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
<form method="post" action="dangtinmua" enctype="multipart/form-data">
    <div class="box-body">
    {{ csrf_field() }}   
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
  
    
    <div class="form-group">
        <label for="bd_noiDung">Nội dung</label>
        <textarea name ="bd_noiDung" id="bd_noiDung" class="form-control ckeditor" rows="5" value="{{ old('bd_noiDung')}}" required></textarea> 
    </div>

    <div class="form-group">
        <label for="bd_ngayHetHan">Ngày hết hạn</label>
        <input type="text" class="form-control" id="bd_ngayHetHan" name="bd_ngayHetHan" value="{{ old('bd_ngayHetHan') }}" data-mask-datetime>
    </div>
    <label>Hình đại diện</label>
    <div class="form-group">
        <div class="file-loading">
              
            <input id="bd_hinh" type="file" name="bd_hinh">
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
    <button type="submit" class="btn btn-primary">Đăng tin</button>
    </div>
</form>
</div></div></div></div></div></div>
<br><br>
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

    });
</script>

<!-- Các script dành cho thư viện Mặt nạ nhập liệu InputMask -->
<script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.js') }}"></script>
<script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
<script src="{{ asset('theme/adminlte/plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>


@endsection
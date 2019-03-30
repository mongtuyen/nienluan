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
<div  class="col-md-12">
<div  class="box box-primary">
<form method="post" action="{{ route('danhsachbaidang.update', ['id' => $baidang->bd_ma]) }}" enctype="multipart/form-data"> 
    <input type="hidden" name="_method" value="PUT" />
    <div class="box-body">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="bd_loai">Loại tin &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        <label class="fancy-radio">
            <input name="bd_loai" value="1" type="radio" id="bd_loai" {{ old('bd_loai', $baidang->bd_loai)==1 ? "checked" : "" }}>
                <span><i></i>Tin mua</span>
        </label>
        <label class="fancy-radio">
            <input name="bd_loai" value="2" type="radio" id="bd_loai" {{ old('bd_loai', $baidang->bd_loai) == 2 ? "checked" : "" }}>
            <span><i></i>Tin bán</span>
        </label>
    </div>
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
                @if($sanpham->sp_ma == $baidang->sp_ma)
                <option value="{{ $sanpham->sp_ma }}" selected>{{ $sanpham->sp_ten }}</option>
                @else
                <option value="{{ $sanpham->sp_ma }}">{{ $sanpham->sp_ten }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="bd_tieuDe">Tiêu đề</label>
        <input type="text" class="form-control" id="bd_tieuDe" name="bd_tieuDe" value="{{ old('bd_tieuDe', $baidang->bd_tieuDe) }}">
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
        <label for="bd_noiDung">Nội dung</label>
        <textarea name ="bd_noiDung" id="bd_noiDung" class="form-control ckeditor" rows="5" required>{{$baidang->bd_noiDung}}</textarea> 
    </div>

    <div class="form-group">
        <label for="nd_ma">Người đăng</label>
        <select name="nd_ma" class="form-control">
            @foreach($danhsachnguoidung as $nguoidung)
                @if($nguoidung->nd_ma == $baidang->nd_ma)
                <option value="{{ $nguoidung->nd_ma }}" selected>{{ $nguoidung->nd_name }}</option>
                @else
                <option value="{{ $nguoidung->nd_ma }}">{{ $nguoidung->nd_name }}</option>
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
@if($baidang->bd_loai==2)
    <label>Hình đại diện</label>
    <div class="form-group">
        <div class="file-loading">        
            <input id="bd_hinh" type="file" name="bd_hinh">
        </div>
    </div>

    <label>Hình ảnh liên quan</label>
    <div class="form-group">
        <div class="file-loading">
            
            <input id="bd_hinhanhlienquan" type="file" name="bd_hinhanhlienquan[]" multiple>
        </div>
    </div>
    <div class="form-group">
        <label for="bd_khoiLuong">Khối lượng</label>
        <input type="number" class="form-control" id="bd_khoiLuong" name="bd_khoiLuong" value="{{ old('bd_khoiLuong', $baidang->bd_khoiLuong) }}">
    </div>
    <div class="form-group">
        <label for="bd_gia">Giá</label>
        <input type="number" class="form-control" id="bd_gia" name="bd_gia" value="{{ old('bd_gia', $baidang->bd_gia) }}">
    </div>
@endif
    <button type="submit" class="btn btn-primary">Lưu</button>
</div>
</form></div></div>
<h3 align="center">Danh sách bình luận</h3>
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
                <td> <a href="{{ route('xoabinhluan',['id' => $bl->bl_ma, 'idbd' => $baidang->bd_ma]) }}">Xóa</a></td>
                <td><form method="post" action="{{ route('xoabinhluan',['id' => $bl->bl_ma, 'idbd' => $baidang->bd_ma]) }}">
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
                    size: {{ Storage::exists('public/photos/' . $baidang->bd_hinh) ? Storage::size('public/photos/' . $baidang->bd_hinh) : 0 }}, 
                    width: "120px", 
                    url: "{$url}", 
                    key: 1
                },
            ]
        });

        $("#bd_hinhanhlienquan").fileinput({
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
            allowedFileExtensions: ["jpg", "gif", "png", "txt"],
            initialPreviewShowDelete: false,
            initialPreviewAsData: true,
            initialPreview: [
                @foreach($baidang->hinhAnh()->get() as $hinhAnh)
                "{{ asset('storage/photos/' . $hinhAnh->ha_ten) }}",
                @endforeach
            ],
            initialPreviewConfig: [
                @foreach($baidang->hinhAnh()->get() as $index=>$hinhAnh)
                {
                    caption: "{{ $hinhAnh->ha_ten }}", 
                    size: {{ Storage::exists('public/photos/' . $hinhAnh->ha_ten) ? Storage::size('public/photos/' . $hinhAnh->ha_ten) : 0 }}, 
                    width: "120px", 
                    url: "{$url}", 
                    key: {{ ($index + 1) }}
                },
                @endforeach
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
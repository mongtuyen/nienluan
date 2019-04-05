
@extends('backend.layouts.index')

@section('title')
Danh sách bài viết
@endsection

@section('main-content')

<h3 align="center">DANH SÁCH BÀI VIẾT</h3>
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div>


<a href="{{ route('danhsachbaidang.create') }}" class="btn btn-primary">Thêm</a>
<a href="{{ route('danhsachbaidang.printmua') }}" class="btn btn-primary">In tin mua</a>
<a href="{{ route('danhsachbaidang.printban') }}" class="btn btn-primary">In tin bán</a>
  
<form style="position:relative;left:580px;" action="{{ route('danhsachbaidang.timkiem') }}" method="post" class="navbar-form navbar-left" role="search">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
  <div class="form-group">
    <input type="text" name="tukhoa" class="form-control" placeholder="Nhập từ khóa tìm kiếm">
  </div>
  <button type="submit" class="btn btn-default">Tìm</button>
</form>
<h4><br></h4>

<div class="box">
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Hình</th>
            <th>Loại tin</th>
            <th>Thuộc sản phẩm</th>           
            <th>Tiêu đề</th>
            <th>Trạng thái sản phẩm</th>           
            <th>Ngày đăng</th>
            <th>Ngày hết hạn</th> 
            <th>Trạng thái tin</th> 
                      
            <th>Khối lượng</th>
            <th>Giá</th>
            <th>Người viết</th>            
            <th>Tùy chọn</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachbaidang as $baidang)
            <tr>
                <td>{{ $baidang->bd_ma }}</td>
                @if($baidang->bd_loai==2)
                <td><img src="{{ asset('storage/photos/' . $baidang->bd_hinh) }}" class="img-list" /></td>
                @else
                <td><img src="{{asset('theme/farmie/img/core-img/logo1.png')}}" class="img-list" alt="" ></td>
                @endif
                <td>
                    @if($baidang->bd_loai==1)
                    {{'Tin mua'}}
                    @else
                    {{'Tin bán'}}
                    @endif
                </td>
                <td>{{$baidang->thuocSanPham->sp_ten}}</td>
                <td>{{ $baidang->bd_tieuDe }}</td>  
                <td>
                  @if( $baidang->bd_loai==2)
                    @if($baidang->bd_trangThaisp==1)
                    {{'Đã thu hoạch'}}
                  
                    @else
                    {{'Chưa thu hoạch'}}
                    
                    @endif
                  @endif
                  
                  @if($baidang->bd_loai==1)
                    <span> </span>
                  @endif
                </td>
                <td>{{ $baidang->bd_ngayDang }}</td>
                <td>{{ $baidang->bd_ngayHetHan }}</td>
                <td>
                    @if($baidang->status==1)
                    <span class="label label-success">Open</span>
                    @else
                    <span class="label label-danger">Close</span>
                    @endif
                </td>
                <td>{{ $baidang->bd_khoiLuong }}</td>
                <td>{{ $baidang->bd_gia }}</td>
                <td>{{$baidang->nguoidung->nd_name}}</td>
                
                <td><a href="{{ route('danhsachbaidang.edit', ['id' => $baidang->bd_ma]) }}"class="btn btn-primary pull-left">Sửa</a>
                <form method="post" action="{{ route('danhsachbaidang.destroy', ['id' => $baidang->bd_ma]) }}">
                        <input type="hidden" name="_method" value="DELETE" />
                        {{ csrf_field() }}
                        
                        <button onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger">Xóa</button></td>
                </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
{{$danhsachbaidang->links()}}
@endsection



















               
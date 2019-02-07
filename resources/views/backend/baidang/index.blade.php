@extends('backend.layouts.index')

@section('title')
Danh sách bài viết
@endsection

@section('main-content')
<h2>DANH SÁCH BÀI VIẾT</h2>
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div>
<a href="{{ route('danhsachbaidang.create') }}" class="btn btn-primary">Thêm</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Loại tin</th>
            <th>Thuộc sản phẩm</th>           
            <th>Tiêu đề</th>
            <th>Trạng thái sản phẩm</th>           
            <th>Ngày đăng</th>
            <th>Ngày hết hạn</th> 
            <th>Hình</th>           
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
                <td>{{ $baidang->bd_loaiTin }}</td>
                <td>
                    @if($baidang->bd_loaiTin==1)
                    {{'Tin bán'}}
                    @else
                    {{'Tin mua'}}
                    @endif
                </td>
                <td>{{$baidang->thocSanPham->sp_ten}}</td>
                <td>{{ $baidang->bd_tieuDe }}</td>  
                <td>{{ $baidang->bd_trangThaisp }}</td>
                <td>
                    @if($baidang->bd_trangThaisp==1)
                    {{'Đã thu hoạch'}}
                    @else
                    {{'Gần thu hoạch'}}
                    @endif
                </td>
                <td>{{ $baidang->bd_ngayDang }}</td>
                <td>{{ $baidang->bd_ngayHetHan }}</td>
               
                <td><img src="{{ asset('storage/photos/' . $baidang->bd_hinh) }}" class="img-list" /></td>
                <td>{{ $baidang->bd_khoiLuong }}</td>
                <td>{{ $baidang->bd_gia }}</td>
                <td>{{$baidang->nguoidung->nd_hoTen}}</td>
                
                <td><a href="{{ route('danhsachbaidang.edit', ['id' => $baidang->bd_ma]) }}"class="btn btn-primary pull-left">Sửa</a>
                <form method="post" action="{{ route('danhsachbaidang.destroy', ['id' => $baidang->bd_ma]) }}">
                        <input type="hidden" name="_method" value="DELETE" />
                        {{ csrf_field() }}
                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">Xóa</button> 
                      <div class="modal modal-danger fade" id="modal-danger" style="display: none;">

                      <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Cảnh báo</h4>
              </div>
              <div class="modal-body">
                <p>Bạn có chắc chắn muốn xóa?</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-outline">Có, hãy xóa</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>

                      
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{$danhsachbaidang->links()}}
@endsection
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
<div>
<a href="{{ route('danhsachbaidang.create') }}" class="btn btn-primary">Thêm</a>

  <div class="col-sm-6">
		<div class="input-group stylish-input-group">
			<input type="text" name="country_name" id="country_name" class="form-control" placeholder="Nhập từ khóa tìm kiếm" />
				<span class="input-group-addon">
					<span class="glyphicon glyphicon-search"></span>
				</span>

		</div>
	</div>
</div>

<div class="box">
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
                <td><img src="{{ asset('storage/photos/' . $baidang->bd_hinh) }}" class="img-list" /></td>
                
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
                    @if($baidang->bd_trangThaisp==1)
                    {{'Đã thu hoạch'}}
                    @else
                    {{'Chưa thu hoạch'}}
                    @endif
                </td>
                <td>{{ $baidang->bd_ngayDang }}</td>
                <td>{{ $baidang->bd_ngayHetHan }}</td>
               
                <td>{{ $baidang->bd_khoiLuong }}</td>
                <td>{{ $baidang->bd_gia }}</td>
                <td>{{$baidang->nguoidung->nd_hoTen}}</td>
                
                <td><a href="{{ route('danhsachbaidang.edit', ['id' => $baidang->bd_ma]) }}"class="btn btn-primary pull-left">Sửa</a>
                <form method="post" action="{{ route('danhsachbaidang.destroy', ['id' => $baidang->bd_ma]) }}">
                        <input type="hidden" name="_method" value="DELETE" />
                        {{ csrf_field() }}
                        <button onclick="return confirm('Bạn Chắc Chắn Muốn Xóa?')" class="btn btn-danger">Xóa</button></td>
					      
                        <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">Xóa</button> 
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
          
          </div>
        
        </div> -->

                      
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
{{$danhsachbaidang->links()}}
@endsection



















               
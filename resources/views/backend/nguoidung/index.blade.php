@extends('backend.layouts.index')

@section('title')
Danh sách người dùng
@endsection

@section('main-content')
<h3 align="center">DANH SÁCH NGƯỜI DÙNG</h3>
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div>
<a href="{{ route('danhsachnguoidung.create') }}" class="btn btn-primary">Thêm</a>
<div class="box">
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Họ tên</th>
            <th>Giới tính</th>
            <th>Chức vụ</th>
            <th>Email</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            <th>Tùy chọn</th>
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachnguoidung as $nguoidung)
            <tr>
                <td>{{ $nguoidung->nd_ma }}</td>
                <td>{{ $nguoidung->nd_hoTen }}</td>
                <td>{{ $nguoidung->nd_gioiTinh }}</td>
                <td>{{ $nguoidung->quyen->q_ten }}</td>
                <td>{{ $nguoidung->nd_email }}</td>
                
                <td>{{ $nguoidung->nd_ngaySinh }}</td>
                <td>{{ $nguoidung->nd_diaChi }}</td>
                <td>{{ $nguoidung->nd_dienThoai }}</td>
               
                <td><a href="{{ route('danhsachnguoidung.edit', ['id' => $nguoidung->nd_ma]) }}"class="btn btn-primary pull-left">Sửa</a>
                <!-- <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">Xóa</button> 
                -->
                <button class="btn btn-danger" data-nd_ma="{{$nguoidung->nd_ma}}" data-toggle="modal" data-target="#delete">Xóa</button>

                <!-- <div class="modal modal-danger fade" id="modal-danger" style="display: none;">
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
                                <form method="post" id="delete" action="{{ route('danhsachnguoidung.destroy', ['id' => $nguoidung->nd_ma]) }}">
                                <input type="hidden" name="_method" value="DELETE" />
                                {{ csrf_field() }}
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Đóng</button>
                                <button type="submit"  class="btn btn-outline">Có, hãy xóa</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> -->

                     
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>

<div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title text-center" id="myModalLabel">Delete Confirmation</h4>
      </div>
      <form action="{{route('danhsachnguoidung.destroy','test')}}" method="post">
      		{{method_field('delete')}}
      		{{csrf_field()}}
	      <div class="modal-body">
				<p class="text-center">
					Are you sure you want to delete this?
				</p>
	      		<input type="hidden" name="nd_ma" id="nd_ma" value="">

	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-outline" data-dismiss="modal">No, Cancel</button>
	        <button type="submit" class="btn btn-outline">Yes, Delete</button>
	      </div>
      </form>
    </div>
  </div>
</div>
@endsection
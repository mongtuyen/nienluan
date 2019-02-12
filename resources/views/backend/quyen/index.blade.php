@extends('backend.layouts.index')

@section('title')
Danh sách quyền
@endsection


@section('main-content')
<h3 align="center">DANH SÁCH QUYỀN</h3>
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div>
<!-- <a href="{{ route('danhsachquyen.create') }}" class="btn btn-primary">Thêm</a> -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
 	Thêm
</button>
<div class="box">
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Tùy chọn</th>
           
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachquyen as $quyen)
            <tr>
                <td>{{ $quyen->q_ma }}</td>
                <td>{{ $quyen->q_ten }}</td>
                <td><a href="{{ route('danhsachquyen.edit', ['id' => $quyen->q_ma]) }}"class="btn btn-primary pull-left">Sửa</a>
                <form method="post" action="{{route('danhsachquyen.destroy',['id' => $quyen->q_ma])}}">
						      <input type="hidden" name="_method" value="DELETE">
						      {{csrf_field()}}
						    <button onclick="return confirm('Bạn Chắc Chắn Muốn Xóa?')" class="btn btn-danger">Xóa</button></td>
					      </form>
               
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
                            
                              <button type="button" class="btn btn-outline" data-dismiss="modal">Đóng</button>
                              <button type="submit" class="btn btn-outline">Có, hãy xóa</button>
                              
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

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Thêm mới quyền<noscript></noscript></h4>
      </div>
      <form action="{{route('danhsachquyen.store')}}" method="post">
      		{{csrf_field()}}
	      <div class="modal-body">
				@include('backend.quyen.form')
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        <button type="submit" class="btn btn-primary">Save</button>
	      </div>
      </form>
    </div>
  </div>
</div>
@endsection
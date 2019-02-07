@extends('backend.layouts.index')

@section('title')
Danh sách quyền
@endsection


@section('main-content')
<h2>DANH SÁCH QUYỀN</h2>
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div>
<a href="{{ route('danhsachquyen.create') }}" class="btn btn-primary">Thêm</a>
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
                <form method="post" action="{{ route('danhsachquyen.destroy', ['id' => $quyen->q_ma]) }}">
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
@endsection
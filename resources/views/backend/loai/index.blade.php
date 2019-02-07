@extends('backend.layouts.index')

@section('title')
Danh sách loại
@endsection


@section('main-content')
<h3>DANH SÁCH LOẠI NÔNG SẢN</h3>
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div>
<a href="{{ route('danhsachloai.create') }}" class="btn btn-primary">Thêm</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Tên</th>
            <th>Tùy chọn</th>   
             
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachloai as $loai)
            <tr>
                <td>{{ $loai->l_ma }}</td>
                <td>{{ $loai->l_ten }}</td>
                <td>
                <a href="{{ route('danhsachloai.edit', ['id' => $loai->l_ma]) }}" class="btn btn-primary pull-left">Sửa</a></a>
                <form method="post" action="{{ route('danhsachloai.destroy', ['id' => $loai->l_ma]) }}">
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

                      
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
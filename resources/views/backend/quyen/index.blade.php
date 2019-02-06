@extends('backend.layouts.index')

@section('title')
Danh sách quyền
@endsection


@section('main-content')
<h3>DANH SÁCH QUYỀN</h3>
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
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
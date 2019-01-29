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
            <td>Sửa</td>
            <td>Xoá</td>
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachquyen as $quyen)
            <tr>
                <td>{{ $quyen->q_ma }}</td>
                <td>{{ $quyen->q_ten }}</td>
                <td><a href="{{ route('danhsachquyen.edit', ['id' => $quyen->q_ma]) }}">Sửa</a></td>
                <td>
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
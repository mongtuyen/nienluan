@extends('backend.layouts.index')

@section('title')
Danh sách nông sản
@endsection

@section('main-content')
<h2>DANH SÁCH NÔNG SẢN</h2>
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div>
<a href="{{ route('danhsachsanpham.create') }}" class="btn btn-primary">Thêm</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mã</th>
            <th>Tên nông sản</th>
            <th>Thuộc loại</th>
            <th>Tùy chọn</th>
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachsanpham as $sanpham)
            <tr>
                <td>{{ $sanpham->sp_ma }}</td>
                <td>{{ $sanpham->sp_ten }}</td>
                <td>{{$sanpham->loai->l_ten}}</td>
                <td><a href="{{ route('danhsachsanpham.edit', ['id' => $sanpham->sp_ma]) }}"class="btn btn-primary pull-left">Sửa</a>
                <form method="post" action="{{ route('danhsachsanpham.destroy', ['id' => $sanpham->sp_ma]) }}">
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
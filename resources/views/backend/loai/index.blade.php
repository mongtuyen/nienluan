@extends('backend.layouts.index')

@section('title')
Danh sách loại
@endsection


@section('main-content')
<h2>DANH SÁCH LOẠI</h2>
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
            <td>Sửa</td>   
            <td>Xóa</td>  
        </tr>
    </thead>
    <tbody>
        @foreach($danhsachloai as $loai)
            <tr>
                <td>{{ $loai->l_ma }}</td>
                <td>{{ $loai->l_ten }}</td>
                <td>
                <a href="{{ route('danhsachloai.edit', ['id' => $loai->l_ma]) }}"><button class='btn btn-lg ' style='background-color:transparent;'>
								<i class="fa fa-pencil"></i></button></a>
                </td>
                <td>
                <form method="post" action="{{ route('danhsachloai.destroy', ['id' => $loai->l_ma]) }}">
                        <input type="hidden" name="_method" value="DELETE" />
                        {{ csrf_field() }}
                        <button class='btn btn-lg ' style='background-color:transparent;'><i class="fa fa-trash"></i></button>
                </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
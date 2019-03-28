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
<a href="{{ route('danhsachnguoidung.print') }}" class="btn btn-primary">In</a>
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
                <td>{{ $nguoidung->nd_name }}</td>
                <td>@if($nguoidung->nd_gioiTinh==1)
                    {{'Nam'}}
                    @elseif($nguoidung->nd_gioiTinh==2)
                    {{'Nữ'}}
                    @endif</td>
                
                <td>{{ $nguoidung->quyen->q_ten }}</td>
                <td>{{ $nguoidung->nd_email }}</td>
                
                <td>{{ $nguoidung->nd_ngaySinh }}</td>
                <td>{{ $nguoidung->nd_diaChi }}</td>
                <td>{{ $nguoidung->nd_dienThoai }}</td>
               
                <td><a href="{{ route('danhsachnguoidung.edit', ['id' => $nguoidung->nd_ma]) }}"class="btn btn-primary pull-left">Sửa</a>
                <form method="post" action="{{ route('danhsachnguoidung.destroy', ['id' => $nguoidung->nd_ma]) }}">
                        <input type="hidden" name="_method" value="DELETE" />
                        {{ csrf_field() }}  
                        <button onclick="return confirm('Bạn có chắc chắn muốn xóa?')" class="btn btn-danger">Xóa</button></td>
					      </form></td>
                                  
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
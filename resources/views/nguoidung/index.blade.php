@extends('backend.layouts.index')

@section('title')
Danh sách người dùng
@endsection

@section('main-content')
<h2>DANH SÁCH NHÂN VIÊN</h2>
<div class="flash-message">
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
      @if(Session::has('alert-' . $msg))
      <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }} <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
      @endif
    @endforeach
</div>
<a href="{{ route('danhsachnguoidung.create') }}" class="btn btn-primary">Thêm</a>
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
            <td>Tùy chọn</td>
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
                <form method="post" action="{{ route('danhsachnguoidung.destroy', ['id' => $nguoidung->nd_ma]) }}">
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
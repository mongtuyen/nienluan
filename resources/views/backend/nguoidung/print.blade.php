@extends('backend.print.layout.paper')
@section('title')
Biểu mẫu Phiếu in danh sách người dùng
@endsection

@section('paper-size') A4 @endsection
@section('paper-class') A4 @endsection

@section('custom-css')
@endsection

@section('content')
<style>
table {
  border-collapse: collapse;
}
</style>
<section class="sheet padding-10mm">
    <article>
        <table border="0" align="center">
            <tr>
                <td class="companyInfo" align="center">
                    Công ty TNHH Nông nghiệp sạch<br />
                    http://nongnghiep.com/<br />
                    0357660188<br />
                    <img src="{{asset('theme/farmie/img/core-img/logo1.png')}}"  width="150px"/>
                </td>
            </tr>
        </table>
        <br />
        <br />
        <?php 
        $tongSoTrang = ceil(count($danhsachnguoidung)/5);
        ?>
        <h3 align="center">DANH SÁCH NGƯỜI DÙNG</h3>
        <table border="1" align="center" cellpadding="5">
            
            <tr>
                <th colspan="8" align="center">Trang 1 / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
            <th>Mã</th>
            <th>Họ tên</th>
            <th>Giới tính</th>
            <th>Chức vụ</th>
            <th>Email</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            
            </tr>
            @foreach ($danhsachnguoidung as $nguoidung)
            <tr>
                <td align="center">{{ $loop->index + 1 }}</td>
                
                <td align="left">{{ $nguoidung->nd_name }}</td>
                <td align="right">@if($nguoidung->nd_gioiTinh==1)
                    {{'Nam'}}
                    @elseif($nguoidung->nd_gioiTinh==2)
                    {{'Nữ'}}
                    @endif</td>
                @foreach ($danhsachquyen as $quyen)
                @if ($nguoidung->q_ma==$quyen->q_ma)
                <td align="left">{{$quyen->q_ten}}</td>
                @endif
                @endforeach
                
                <td align="right">{{ $nguoidung->nd_email }}</td>
                <td align="right">{{ $nguoidung->nd_ngaySinh }}</td>
                <td align="right">{{ $nguoidung->nd_diaChi }}</td>
                <td align="right">{{ $nguoidung->nd_dienThoai }}</td>
                
                
            </tr>
            @if (($loop->index + 1) % 5 == 0)
            </table>
        <div class="page-break"></div>
        <table border="1" align="center" cellpadding="5">
            <tr>
                <th colspan="8" align="center">Trang {{ 1 + floor(($loop->index + 1) / 5) }} / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
            <th>Mã</th>
            <th>Họ tên</th>
            <th>Giới tính</th>
            <th>Chức vụ</th>
            <th>Email</th>
            <th>Ngày sinh</th>
            <th>Địa chỉ</th>
            <th>Điện thoại</th>
            </tr>
            @endif
            @endforeach
        </table>
    </article>
</section>
@endsection
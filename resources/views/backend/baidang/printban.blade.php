@extends('backend.print.layout.paper')
@section('title')
Biểu mẫu Phiếu in danh sách tin bán
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
                    http://nongnghiepsach.com/<br />
                    035 766 1088<br />
                    <img src="{{asset('theme/farmie/img/core-img/logo1.png')}}"  width="150px"/>
                </td>
            </tr>
        </table>
        <br />
        <br />
        <?php 
        $tongSoTrang = ceil(count($danhsachbaidang)/10);
        ?>
        <h3 align="center">DANH SÁCH BÀI ĐĂNG BÁN</h3>
        <table border="1" align="center" cellpadding="5">
            
            <tr>
                <th colspan="10" align="center">Trang 1 / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
            <th>Mã</th>
            <th>Sản phẩm</th>
            <th>Tiêu đề</th>
            <th>Hình</th>
            <th>Trạng thái sản phẩm</th>
            <th>Giá</th>
            <th>Khối lượng</th>           
            <th>Người đăng</th>          
            <th>Ngày đăng</th>
           
            </tr>
            @foreach ($danhsachbaidang as $baidang)
            <tr>
                <td align="center">{{ $loop->index + 1 }}</td>
                @foreach ($danhsachsanpham as $sp)
                @if ($baidang->sp_ma==$sp->sp_ma)
                <td align="left">{{$sp->sp_ten}}</td>
                @endif
                @endforeach
                <td align="left">{{ $baidang->bd_tieuDe }}</td>
                <td align="center">
                    <img src="{{ asset('storage/photos/' . $baidang->bd_hinh) }}" height="50px" width="50px"/>
                </td>
                <td align="left">
                    @if($baidang->bd_trangThaisp==1)
                    {{'Đã thu hoạch'}}
                    @else
                    {{'Chưa thu hoạch'}}
                    @endif</td>
                <td align="left">{{ $baidang->bd_gia }}</td>
                <td align="left">{{ $baidang->bd_khoiLuong }}</td>
                @foreach ($danhsachnguoidung as $nd)
                @if ($baidang->nd_ma==$nd->nd_ma)
                <td align="left">{{$nd->nd_name}}</td>
                @endif
                @endforeach
                <td align="left">{{ $baidang->bd_ngayDang }}</td>             
                
            </tr>
            
            @if (($loop->index + 1) % 10 == 0)
        </table>
        <div class="page-break"></div>
        <table border="1" align="center" cellpadding="10">
            <tr>
                <th colspan="10" align="center">Trang {{ 1 + floor(($loop->index + 1) / 10) }} / {{ $tongSoTrang }}</th>
            </tr>
            <tr>
            <th>Mã</th>
            <th>Sản phẩm</th>
            <th>Tiêu đề</th>
            <th>Hình</th>
            <th>Trạng thái sản phẩm</th>
            <th>Giá</th>
            <th>Khối lượng</th>           
            <th>Người đăng</th>          
            <th>Ngày đăng</th>
            </tr>
            @endif

            @endforeach
        </table>
    </article>
</section>
@endsection
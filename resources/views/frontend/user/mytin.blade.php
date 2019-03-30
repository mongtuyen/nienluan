
@extends('frontend.layouts.partials.index1')
@section('title')
Tin của tôi
@endsection

@section('main-content')
<div class="container">
<div class="col-md-9">
	<h5 style="margin-bottom: 10px;">DANH SÁCH TIN</h5>
	<table class="table table-responsive table-hover">
		<thead>
			<tr>
				<th>STT</th>
				<th>Thuộc sản phẩm</th>
				<th>Tiêu đề</th>
				<th>Trạng thái</th>
				<th>Tùy chọn</th>
			</tr>
		</thead>
		<tbody>
			@foreach($baidang as $i => $bd)
			<tr>
				<td>{{$i+1}}</td>
				<td>{{$bd->thuocSanPham->sp_ten}}</td>
				<td>{{$bd->bd_tieuDe}}</td>
				<td>Open</td>				
				<td><a href="{{ route('profile.editmytin', ['id' => $bd->bd_ma]) }}" class="btn btn-primary pull-left">Sửa</a>
                
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
</div>
@endsection
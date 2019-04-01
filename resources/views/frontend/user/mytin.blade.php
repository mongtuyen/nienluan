
@extends('frontend.layouts.partials.index1')
@section('title')
Tin của tôi
@endsection

@section('main-content')

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
.w3-button {width:70px;}
</style>


<h3 align="center">DANH SÁCH TIN</h3>
<div class="container">
<div  class="col-md-12">
<div  class="box box-primary">

<table class="table table-bordered">
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
				<td>@if($bd->status==2)
				{{'Close'}}
				@else 
				{{'Open'}}
				@endif</td>	
						
				<td><a href="{{ route('profile.editmytin', ['id' => $bd->bd_ma]) }}" class="w3-button w3-green">Sửa</a>
               
			@endforeach
		</tbody>
		
	</table>
	<br>
	<br><br><br>
	<br><br><br>
	<br><br><br>
	<br><br>
</div>
</div></div>
@endsection
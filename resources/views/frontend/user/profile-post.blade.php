<div class="col-md-9">
	<h5 style="margin-bottom: 10px;">Tin Đã Đăng Gần Đây</h5>
	<table class="table table-responsive table-hover">
		<thead>
			<tr>
				<th>STT</th>
				<th>Bài Đăng</th>
				<th>Loại Phòng</th>
				<th>Giá Phòng</th>
				<th>Tình Trạng</th>
				<th>Thao Tác</th>
			</tr>
		</thead>
		<tbody>
			@foreach($danhsachphong as $i => $phong)
			<tr>
				<td>{{$i+1}}</td>
				<td>{{$phong->p_ten}}</td>
				<td>{{$phong->l_ten}}</td>
				<td>{{number_format($phong->p_giaThue,0)}} VNĐ</td>
				@if($phong->p_trangThai == 1)
				<td>
					<span class="label label-danger">Chưa Kiểm Duyệt</span>
				</td>
				@elseif($phong->p_trangThai == 2)
				<td>
					<span class="label label-success">Đã Duyệt</span>
				</td>
				@else
				<td>
					<span class="label label-info">Đã Được Thuê</span>
				</td>
				@endif
				<td>
					<a href=""><i class="fas fa-eye"></i> Xem</a>
					<a href="" style="color:red"><i class="fas fa-trash-alt"></i> Xóa</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
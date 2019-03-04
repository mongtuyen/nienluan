<div class="col-md-9">
	<h5 style="margin-bottom: 10px;">Thông Tin Tài Khoản</h5>
	<form method="POST" action="{{route('profile.updateProfile',['id' => Auth::user()->id])}}" name="frmInfo">
		{{csrf_field()}}
		<div class="form-group">
			<lable>Tên Tài khoản:</lable>
			<input disabled="true" type="text" value="{{Auth::user()->username}}" class="form-control">
		</div>
		<div class="form-group">
			<lable>Tên Hiển Thị:</lable>
			<input name="name" type="text" value="{{Auth::user()->name}}" class="form-control" ng-required=true>
		</div>
		<div class="form-group">
			<lable>Email</lable>
			<input name="email" type="email" value="{{Auth::user()->email}}" class="form-control" ng-required=true>
		</div>
		<div class="form-group text-center">
			<button type="submit" id="btnSubmit" class="btn btn-default">Lưu</button>
		</div>
	</form>
</div>

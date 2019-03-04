@include('frontend.layouts.partials.header')
@section('title')
Login
@endsection
@section('custom-css')
<style type="text/css" media="screen">
.login-section{
	width: 100%;
	height: auto;
	padding-top: 20px;
	padding-bottom: 20px;
	display: inline-table;
	align-items: center;
}
#btnSubmit{
	background: #30caa0;
	color: white;
	width: 200px;
}
.error {color: red;}
.valid {color: blue;}
</style>
@endsection
@section('main-content')
<div class="container">
	<div class="login-section" ng-controller="loginController">
		<h2 class="text-center">ĐĂNG NHẬP</h2>
		@if(Session::has('alert-danger'))
		<div class="alert alert-danger">
			{{Session::get('alert-danger')}}
			<a style="margin-left: 820px; color:black;" href="" data-dismiss="alert"><i class="fa fa-close"></i></a>
		</div>
		@endif
		<form ng-submit="submitForm()" name="frmLogin">
			<div class="form-group">
				<lable>Tên Đăng Nhập:</lable>
				<input class="form-control" type="text" name="username" id="username" placeholder="Tên Đăng Nhập" ng-model="username" ng-required=true>
				<span class="error" ng-show="frmLogin.username.$error.required">Vui lòng nhập tên tài khoản</span>
			</div>
			<div class="form-group">
				<lable>Mật Khẩu:</lable>
				<input class="form-control" type="password" name="password" id="password" placeholder="Mật Khẩu" ng-model="password" ng-required=true>
				<span class="error" ng-show="frmLogin.password.$error.required">Vui lòng nhập mật khẩu</span>
			</div>
			<div class="form-group text-center">
				<button type="submit" id="btnSubmit" class="btn btn-default">Đăng Nhập</button>
			</div>
		</form>
	</div>
</div>
@endsection

@section('custom-script')
<script>
	var app = angular.module('userApp',[]);
	app.controller('loginController', function($scope){
		$scope.submitForm = function(){
			if ($scope.frmLogin.$valid) {
				$.ajax({
					type: 'POST',
					url: '{{route('dang-nhap.postLogin')}}',
					data: {
						'username': $('#username').val(),
						'password': $('#password').val(),
						'_token': '{{ csrf_token() }}' 
					},
					success: function(response){
						if(response == 1){
							swal({
								title: "Đăng Nhập Thành Công!",
								text: "Nhấn Ok Để Tiếp Tục!",
								icon: "success",
								button: "OK"
							}).then(function() {
								window.location = "http://localhost::1000/niemluan/public";
							});
						}else if(response == 0){
							swal({
								title: "Đăng Nhập Thất Bại!",
								text: "Nhấn Ok Để Tiếp Tục!",
								icon: "error",
								button: "OK"
							});
						}
					}
				});
			}
		};
	});
</script>
@endsection
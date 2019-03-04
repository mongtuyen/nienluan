@extends('frontend.layouts.index')
@section('title')
Đăng Ký - Nhà Trọ Thông Minh
@endsection
@section('custom-css')
<style type="text/css" media="screen">
.register-section{
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
.valid {color: #28a745;}
</style>
@endsection
@section('main-content')
<div class="container">
	<div class="register-section" ng-controller="registerController">
		<h2 class="text-center">ĐĂNG KÝ THÀNH VIÊN</h2>
		<form ng-submit="submitForm()" name="frmRegister">
			<div class="row">
				<div class="col-md-12">
					<div class="form-group">
						<lable for="name">Họ Tên:</lable>
						<input type="text" class="form-control" name="name" id="name" ng-model="name" ng-required=true>
						<span class="error" ng-show="frmRegister.name.$error.required">Vui Lòng Nhập Họ Tên</span>
					</div>
					<div class="form-group">
						<lable for="username">Tên Tài Khoản:</lable>
						<input type="text" class="form-control" name="username" id="username" ng-model="username" ng-required=true ng-minlength="5" ng-maxlength="50">
					</div>
					<span class="error" ng-show="frmRegister.username.$error.required">Vui Lòng Nhập Tên Tài Khoản</span>
					<span class="error" ng-show="frmRegister.username.$error.minlength">Tên Tài Khoản Ít Nhất 5 Kí Tự</span>
					<span class="error" ng-show="frmRegister.username.$error.maxlength">Tên Tài Khoản Tối Đa 50 Kí Tự</span>
					<div class="form-group">
						<lable for="email">Email:</lable>
						<input type="email" class="form-control" name="email" id="email" ng-model="email" ng-required=true>
						<span class="error" ng-show="frmRegister.email.$error.email">Email Không Hợp Lệ</span>
						<span class="error" ng-show="frmRegister.email.$error.required">Vui Lòng Nhập Email</span>
					</div>
					<div class="form-group">
						<lable for="password">Mật Khẩu:</lable>
						<input type="password" class="form-control" name="password" id="password" ng-model="password" ng-required=true ng-minlength="6" ng-maxlength="30">
						<span class="error" ng-show="frmRegister.password.$error.required">Vui Lòng Nhập Mật Khẩu</span>
						<span class="error" ng-show="frmRegister.password.$error.minlength">Mật Khẩu Ít Nhất 6 Kí Tự</span>
						<span class="error" ng-show="frmRegister.password.$error.maxlength">Mật Khẩu Tối Đa 30 Kí Tự</span>
					</div>
					<div class="form-group">
						<lable for="confirm_password">Nhập Lại Mật Khẩu:</lable>
						<input type="password" class="form-control" name="confirm_password" id="confirm_password" ng-model="confirm_password" ng-required=true password-match="password">
						<span class="error" ng-show="frmRegister.confirm_password.$dirty &&
						frmRegister.confirm_password.$error.unique">Mật Khẩu Không Giống Nhau.</span>
						<div class="alert alert-success" ng-show="frmRegister.$valid">Thông Tin Hợp Lệ! Có Thể Đăng Ký</div>
					</div>
					<div id="noti"></div>
					<div class="form-group text-center">
						<button type="submit" id="btnSubmit" class="btn btn-default">Đăng Ký</button>
					</div>

				</div>
			</div>
		</form>
	</div>
</div>
@endsection
@section('custom-script')
<script>
	var app = angular.module('userApp',[]).directive('passwordMatch', [function () {
		return {
			restrict: 'A',
			scope:true,
			require: 'ngModel',
			link: function (scope, elem , attrs,control) {
				var checker = function () {
   //lấy giá trị của trường mật khẩu
   var e1 = scope.$eval(attrs.ngModel);
   //lấy giá trị của xác nhận mật khẩu
   var e2 = scope.$eval(attrs.passwordMatch);
   return e1 == e2;
};
scope.$watch(checker, function (n) {
   //thiết lập form control
   control.$setValidity("unique", n);
});
}
};
}]);
	app.controller('registerController', function($scope){
		$scope.submitForm = function(){
			$('#noti').html('<div></div>');
			if($scope.frmRegister.$valid){
				$.ajax({
					type: "POST",
					url: "{{route('dang-ky.postRegister')}}",
					data: {
						'name': $('#name').val(),
						'username': $('#username').val(),
						'email': $('#email').val(),
						'password': $('#password').val(),
						'_token': '{{ csrf_token() }}' 
					},
					success: function(response){
						if(response == 1){
							$('#noti').html('<div class="alert alert-danger">Tên Tài Khoản Hoặc Email Đã Có Người Sử Dụng</div>');
							console.log(response);
						}else if(response == 0){
							swal({
								title: "Đăng Ký Thành Công!",
								text: "Nhấn Ok Để Tiếp Tục!",
								icon: "success",
								button: "OK"
							}).then(function() {
								window.location = "http://localhost/NhaTroThongMinh/public";
							});
						}
					}
				});
			}
		};
	});

</script>
@endsection

@extends('frontend.layouts.index_user')
@section('title')
Thông Tin Tài Khoản - Nhà Trọ Thông Minh
@endsection
@section('custom-css')
<style type="text/css" media="screen">
.profile-section{
	width: 100%;
	height: auto;
	display: inline-table;
	align-items: center;
}
.label {
	display: inline;
	padding: .2em .6em .3em;
	font-size: 75%;
	font-weight: bold;
	line-height: 1;
	color: @label-color;
	text-align: center;
	white-space: nowrap;
	vertical-align: baseline;
	border-radius: .25em;
}
.profiles .image img {
	border-radius: 50%;
}
.profiles .image {
	width: 45px;
	height: 45px;
	overflow: hidden;
	float: left;
	margin-right: 10px;
	margin-bottom: 0;
}
.profiles .name {
	font-size: 13px;
	margin-bottom: 5px;
	color: #242424;
	margin-top: 5px;
	font-family: Roboto;
	font-weight: 300;
}
.tiki-account .wrap .profiles h6 {
	margin: 0;
	font-family: Roboto;
	font-size: 16px;
	font-weight: 400;
	font-style: normal;
	font-stretch: normal;
	color: #242424;
}
.nenxam{
	background-color: #84848426;
}
.menu-sidebar{
	margin-top: 20px;
}
.menu-sidebar li{
	padding-bottom: 10px;
	list-style: none;
	border-bottom: 1px solid #84848438;
}
.menu-sidebar li a{
	color: black;
}
.menu-sidebar li a i{
	margin-right: 10px;
}
#btnSubmit{
	background: #30caa0;
	color: white;
	width: 200px;
}
.error {color: red;}
.valid {color: #28a745;}
</style>
<link rel="stylesheet" href="{{asset('theme/leramiz/css/AdminLTE.min.css')}}"/>
@endsection
@section('main-content')
<div class="profile-section" >
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3 nenxam">
				<div class="profiles">
					<p class="image"><img src="https://salt.tikicdn.com/desktop/img/avatar.png?v=3" height="45" width="45" alt=""></p>
					<p class="name">Tài khoản của</p>
					<h6>{{Auth::user()->name}}</h6>
				</div>
				<ul class="menu-sidebar">
					<li class="active">
						<a href="?ID=bai-dang">
							<i class="fas fa-building"></i>
							<span>Bài Đăng</span>
						</a>
					</li>
					<li>
						<a href="?ID=thong-tin">
							<i class="fas fa-user"></i>
							<span>Thông tin tài khoản</span>
						</a>
					</li>
					<li>
						<a href="?ID=doi-mat-khau">
							<i class="fas fa-key"></i>
							<span>Đổi Mật Khẩu</span>
						</a>
					</li>
				</ul>
			</div>
			<?php 
			if(isset($_GET['ID']))
			{
				$ID = $_GET['ID'];
				if($ID == 'bai-dang'){
					?>
					@include('frontend.user.profile-post')
					<?php
				}else if($ID == 'thong-tin'){
					?>
					@include('frontend.user.profile-info')
					<?php
				}
				else if($ID == 'doi-mat-khau'){
					?>
					@include('frontend.user.profile-password')
					<?php
				}
			}
			else{
				?>
				@include('frontend.user.profile-post')
				<?php
			}
			?>
		</div>
	</div>
</div>
@endsection
@section('custom-script')
<script>
	var app = angular.module('userApp',[],
		function($interpolateProvider) {
			$interpolateProvider.startSymbol('<%'); /* Thay thế dấu { }x2 của angular thành <% %>*/
			$interpolateProvider.endSymbol('%>')
		}).directive('passwordMatch', [function () {
			return {
				restrict: 'A',
				scope:true,
				require: 'ngModel',
				link: function (scope, elem , attrs,control) {
					var checker = function () {
						var e1 = scope.$eval(attrs.ngModel);
						var e2 = scope.$eval(attrs.passwordMatch);
						return e1 == e2;
					};
					scope.$watch(checker, function (n) {
						control.$setValidity("unique", n);
					});
				}
			};
		}]);
		app.controller('infoController', function($scope){
		});
		app.controller('passController', function($scope){
			$scope.submitFormPass = function(){
				if($scope.frmPassword.$valid){
					$.ajax({
						type: "POST",
						url: '{{route('profile.getPassword',['id' => Auth::user()->id])}}',
						data:{
							'password': $('#password').val(),
							'_token': '{{csrf_token()}}'
						},
						success: function(data){
							if(data == 1){
								swal({
									title: "Thất Bại!",
									text: 'Mật Khẩu Hiện Tại Không Đúng!',
									icon: "error",
									button: "OK"
								});
							}
							else if(data == 0){

								$.ajax({
									type: "POST",
									url: "{{route('profile.updatePassword',['id' => Auth::user()->id])}}",
									data:{
										'password_new': $('#password_new').val(),
										'_token': '{{csrf_token()}}'
									},
									success: function(data){
										if(data == 1){
											swal({
												title: "Thất Bại!",
												text: 'Vui Lòng Thử Lại!',
												icon: "error",
												button: "OK"
											});
										}else if(data == 0){
											swal({
												title: "Thành Công!",
												text: 'Đổi Mật Khẩu Thành Công!',
												icon: "success",
												button: "OK"
											}).then(function() {
												window.location = "http://localhost/NhaTroThongMinh/public";
											});
										}
									}
								});
							}
						}
					});
				}
			};
		});
	</script>
	@if(Session::has('success-info'))
	<script>
		swal({
			title: "Thành Công!",
			text: '{{Session::get('success-info')}}',
			icon: "success",
			button: "OK"
		});
	</script>
	@endif
	@endsection




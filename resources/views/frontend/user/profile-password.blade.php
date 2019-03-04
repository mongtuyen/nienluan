<div class="col-md-9" ng-controller="passController">
	<h5 style="margin-bottom: 10px;">Đổi Mật Khẩu</h5>
	<form ng-submit="submitFormPass()" name="frmPassword">
		<div class="form-group">
			<lable>Mật Khẩu Hiện Tại:</lable>
			<input name="password" id="password" type="password" class="form-control" ng-required=true ng-model="password">
			<span class="error" ng-show="frmPassword.password.$error.required">Vui Lòng Nhập Mật Khẩu</span>
		</div>
		<div class="form-group">
			<lable for="password_new">Mật Khẩu Mới:</lable>
			<input type="password" class="form-control" name="password_new" id="password_new" ng-model="password_new" ng-required=true ng-minlength="6" ng-maxlength="30">
			<span class="error" ng-show="frmPassword.password_new.$error.required">Vui Lòng Nhập Mật Khẩu</span>
			<span class="error" ng-show="frmPassword.password_new.$error.minlength">Mật Khẩu Ít Nhất 6 Kí Tự</span>
			<span class="error" ng-show="frmPassword.password_new.$error.maxlength">Mật Khẩu Tối Đa 30 Kí Tự</span>
		</div>
		<div class="form-group">
			<lable for="confirm_password">Nhập Lại Mật Khẩu:</lable>
			<input type="password" class="form-control" name="confirm_password" id="confirm_password" ng-model="confirm_password" ng-required=true password-match="password_new">
			<span class="error" ng-show="frmPassword.confirm_password.$dirty &&
			frmPassword.confirm_password.$error.unique">Mật Khẩu Không Giống Nhau.</span>
			<div class="form-group text-center">
				<button type="submit" id="btnSubmit" class="btn btn-default">Lưu</button>
			</div>
		</form>
	</div>

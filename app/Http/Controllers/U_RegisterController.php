<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Auth;
class U_RegisterController extends Controller
{
    public function getRegister(){
		if(Auth::check()){
			return redirect()->route('frontend.home');
		}else{
			return view('frontend.user.register');
		}
	}
	public function postRegister(Request $request){
		if(Nguoidung::where('nd_taiKhoan',$request->nd_taiKhoan)->first() || Nguoidung::where('nd_email',$request->nd_email)->first()){
			return response()->json([
				$data = 1
			],200);
		}else{
			$nd = new Nguoidung();
			$nd->nd_hoTen = $request->nd_hoTen;
			$nd->nd_taiKhoan = $request->nd_taiKhoan;
			$nd->nd_matKhau = bcrypt($request->nd_matKhau);
			$nd->nd_email = $request->nd_email;
			$nd->nd_diaChi = $request->nd_diaChi;
            $nd->nd_dienThoai = $request->nd_dienThoai;
            $nd->nd_ngaySinh = $request->nd_ngaySinh;
            $nd->nd_gioiTinh = $request->nd_gioiTinh;
            $nd->q_ma = $request->q_ma;
            
			$nd->save();
			return response()->json([
				$data = 0
			],200);
		}
	}
}

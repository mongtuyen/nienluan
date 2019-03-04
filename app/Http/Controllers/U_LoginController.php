<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Nguoidung;
use Session;
class U_LoginController extends Controller
{
    public function getLogin()
	{
		if(Auth::check())
		{
			return redirect()->route('frontend.home');
		}
		return view('frontend.user.login');
	}
	public function postLogin(Request $request)
	{
		$login = [
			'username' => $request->username,
			'password' => $request->password,
			
		];
		if(Auth::attempt($login))
		{
			return response()->json([
				$data = 1
			],200);
		}else{
			return response()->json([
				$data = 0
			],200);
		}
	}
}

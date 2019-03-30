<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Session;
class User2Login
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            $user=Auth::user();
            if($user->q_ma==2)
                 return $next($request);
             else 
                Session::flash('alert-info', 'Đăng nhập với loại tài khoản Người thu mua để đăng tin mua');
            
                return redirect()->back();
                
        }
        else 
            Session::flash('alert-info', 'Đăng nhập với loại tài khoản Người thu mua để đăng tin mua');
            return redirect('/dangnhap');
        
    }
}

<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;
use Session;
class User3Login
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
            if($user->q_ma==3)
                 return $next($request);
             else 
             Session::flash('alert-info', 'Đăng nhập với loại tài khoản Nông dân để đăng tin bán');
            
                return redirect()->back();
                //return $next($request);
        }
        else 
            Session::flash('alert-info', 'Đăng nhập với loại tài khoản Nông dân để đăng tin bán');
            
            return redirect('/dangnhap');
        
    }
}

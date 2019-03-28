<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Quyen;
use App\User;
use DB;
use Session;

class NguoidungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getloginadmin()
    {
        return view('auth.login');
    }
    public function postloginadmin(Request $request)
    {
        //return dd($request);
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required|min:5|max:10'
        ],[
            'username.required'=>'Bạn chưa nhập tên đăng nhập',
            'password.required'=>'Bạn chưa nhập mật khẩu'
        ]);
        if(Auth::attempt(['username'=>$request->username,
                          'password'=>$request->password]))
                        {
                        return redirect('/admin/danhsachbaidang');
                        }
        else{
            Session::flash('alert-danger', 'Đăng ký thất bại!');
            return redirect('/admin/login');
        }
      
        
    }
    public function adminlogout()
    {
        Auth::logout();
        return redirect('/admin/login');
    }

    public function getLogin(){
        return view('frontend.user.login');
    }
    public function postLogin(Request $request){
        //echo $request->username;
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required|min:5|max:10'
        ],[
            'username.required'=>'Bạn chưa nhập tên đăng nhập',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 5 ký tự'
        ]);
        if(Auth::attempt(['username'=>$request->username,
                          'password'=>$request->password]))
                        {
                        return redirect('/trangchu');
                        }
        else{
            Session::flash('alert-warning', 'Tên đăng nhập hoặc mật khẩu chưa đúng');
            return back();
        }
    }
    public function getLogout()
    {
        Auth::logout();
        return redirect('/trangchu');
    }

    public function getRegister(){
        //$ds_quyen = Quyen::all(); 
        $ds_quyen =Quyen::where('q_ma', '>', 1)->take(10)->get();
        return view('frontend.user.register') ->with('danhsachquyen', $ds_quyen);
    }
    public function postRegister(Request $request)
    {
        $validation = $request->validate([
            'nd_name' =>'required|string',
            'nd_email' => 'required|string|email|max:255|unique:users',
            'username' =>'required|string|max:20|unique:users',
            'password' => 'required|string|min:6',
            'nd_dienThoai' =>'required|numeric|min:10',
            'nd_ngaySinh'=>'required'
        ],[
            'nd_name.required'=>'Bạn chưa nhập họ tên',
            'nd_email.required'=>'Bạn chưa nhập email',
            'nd_ngaySinh.required'=>'Bạn chưa nhập ngày sinh',
            'username.required'=>'Bạn chưa nhập tài khoản',
            'username.unique'=>'Tài khoản đã tồn tại',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 5 ký tự',
            'nd_dienThoai.required'=>'Bạn chưa nhập số điện thoại',
            'nd_email.unique'=>'Email đã đăng ký'
        ]);
       
        $nguoidung = new User();
        $nguoidung->nd_ma = $request->nd_ma;
        $nguoidung->nd_name = $request->nd_name;
        $nguoidung->username = $request->username;
        $nguoidung->password = bcrypt($request->password);
        $nguoidung->nd_gioiTinh = $request->nd_gioiTinh;
        $nguoidung->nd_diaChi = $request->nd_diaChi;
        $nguoidung->nd_dienThoai = $request->nd_dienThoai;
        $nguoidung->nd_email = $request->nd_email;
        $nguoidung->nd_ngaySinh = $request->nd_ngaySinh;
        $nguoidung->q_ma = $request->q_ma;
        $nguoidung->save();
        Session::flash('alert-info', 'Đăng ký thành công!');
        return redirect('/dangnhap');
    
    }
    public function getUser(){
        $user = User::find(Auth::user()->id);
        return view('frontend.user.profile-info')
                ->with('user', $user);;
    }
    public function updateUser(Request $request)
    {
        $validation = $request->validate([
            'nd_name' =>'required|string',
            'nd_email' => 'required|string|email|max:255',
            'username' =>'required|string|max:20',
            'password' => 'required|string|min:6',
            'nd_dienThoai' =>'required|numeric|min:10',
            'nd_ngaySinh'=>'required'
            
        ],[
            'nd_name.required'=>'Bạn chưa nhập họ tên',
            'nd_email.required'=>'Bạn chưa nhập email',
            'nd_ngaySinh.required'=>'Bạn chưa nhập ngày sinh',
            'username.required'=>'Bạn chưa nhập tài khoản',
            'username.unique'=>'Tài khoản đã tồn tại',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'password.min'=>'Mật khẩu ít nhất 5 ký tự',
            'nd_dienThoai.required'=>'Bạn chưa nhập số điện thoại',
            'nd_email.unique'=>'Email đã đăng ký'
        ]);
        //$nd = Auth::user();
        //$nd = User::find(Auth::user()->id);
        // return dd(Auth::user());
        //$nd = User::where('nd_ma',$id)->first();
        Auth::user()->nd_name = $request->nd_name;
        Auth::user()->username = $request->username;
        Auth::user()->password = bcrypt($request->password);
        Auth::user()->nd_gioiTinh = $request->nd_gioiTinh;
        Auth::user()->nd_diaChi = $request->nd_diaChi;
        Auth::user()->nd_dienThoai = $request->nd_dienThoai;
        Auth::user()->nd_email = $request->nd_email;
        Auth::user()->nd_ngaySinh = $request->nd_ngaySinh;        
        Auth::user()->save();
        
        Session::flash('alert-info', 'Cập nhật thành công!');
        return redirect('nguoidung');
    
    }
    public function index()
    {
        $ds_nguoidung = User::all(); 
        return view('backend.nguoidung.index')
            ->with('danhsachnguoidung', $ds_nguoidung);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ds_quyen = Quyen::all(); 
        return view('backend.nguoidung.create')
            ->with('danhsachquyen', $ds_quyen);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'nd_name' =>'required|string',
            'nd_email' => 'required|string|email|max:255|unique:users',
            'username' =>'required|string|max:20|unique:users',
            'password' => 'required|string|min:6',
            'nd_dienThoai' =>'required|numeric|min:10'
            
        ],[
            'nd_name.required'=>'Bạn chưa nhập họ tên',
            'nd_email.required'=>'Bạn chưa nhập email',
            'username.required'=>'Bạn chưa nhập tài khoản',
            'username.unique'=>'Tài khoản đã tồn tại',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'nd_dienThoai.required'=>'Bạn chưa nhập số điện thoại'
        ]);
       
        $nguoidung = new User();
        $nguoidung->nd_ma = $request->nd_ma;
        $nguoidung->nd_name = $request->nd_name;
        $nguoidung->username = $request->username;
        $nguoidung->password = $request->password;
        $nguoidung->nd_gioiTinh = $request->nd_gioiTinh;
        $nguoidung->nd_diaChi = $request->nd_diaChi;
        $nguoidung->nd_dienThoai = $request->nd_dienThoai;
        $nguoidung->nd_email = $request->nd_email;
        $nguoidung->nd_ngaySinh = $request->nd_ngaySinh;
        $nguoidung->q_ma = $request->q_ma;
        $nguoidung->save();
        Session::flash('alert-info', 'Thêm thành công!');
        return redirect()->route('danhsachnguoidung.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $nguoidung = User::where("nd_ma",  $id)->first();
        $ds_quyen = Quyen::all();

        return view('backend.nguoidung.edit')
            ->with('nguoidung', $nguoidung)
            ->with('danhsachquyen', $ds_quyen);
  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'nd_name' =>'required|string',
            'nd_email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
            'nd_dienThoai' =>'required|numeric|min:10',
            'username' =>'required|string|max:20',
            
        ],[
            'nd_name.required'=>'Bạn chưa nhập họ tên',
            'nd_email.required'=>'Bạn chưa nhập email',
            'password.required'=>'Bạn chưa nhập mật khẩu',
            'username.required'=>'Bạn chưa nhập tài khoản',
            'nd_dienThoai.required'=>'Bạn chưa nhập số điện thoại'
        ]);
        $nguoidung = User::where("nd_ma",  $id)->first();
        $nguoidung->nd_name = $request->nd_name;
        $nguoidung->username = $request->username;
        $nguoidung->password = bcrypt($request->password);
        $nguoidung->nd_gioiTinh = $request->nd_gioiTinh;
        $nguoidung->nd_diaChi = $request->nd_diaChi;
        $nguoidung->nd_dienThoai = $request->nd_dienThoai;
        $nguoidung->nd_email = $request->nd_email;
        $nguoidung->nd_ngaySinh = $request->nd_ngaySinh;
        $nguoidung->q_ma = $request->q_ma;
        $nguoidung->save();
        

        Session::flash('alert-info', 'Cập nhật thành công!');
        return redirect()->route('danhsachnguoidung.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $nguoidung = User::where("nd_ma",  $id)->first();
        $nguoidung->delete();
        Session::flash('alert-danger', 'Xoá thành công!');
        return redirect()->route('danhsachnguoidung.index');
   
    }
    public function print()
    {
        $ds_nguoidung = User::all();
        $ds_quyen = Quyen::all();
        $data = [
            'danhsachnguoidung' => $ds_nguoidung,
            'danhsachquyen'=>$ds_quyen,
        ];
  
        return view('backend.nguoidung.print')
            ->with('danhsachnguoidung', $ds_nguoidung)
            ->with('danhsachquyen', $ds_quyen);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nguoidung;
use App\Quyen;
use DB;
use Session;

class NguoidungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_nguoidung = Nguoidung::all(); 
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
            'nd_hoTen' =>'required|string',
            'nd_email' => 'required|string|email|max:255|unique',
            'nd_taiKhoan' =>'required|string|max:20|unique:nguoidung',
            'nd_matKhau' => 'required|string|min:6',
            'nd_dienThoai' =>'required|numeric|min:10'
            
        ],[
            'nd_hoTen.required'=>'Bạn chưa nhập họ tên',
            'nd_email.required'=>'Bạn chưa nhập email',
            'nd_taiKhoan.required'=>'Bạn chưa nhập tài khoản',
            'nd_taiKhoan.unique'=>'Tài khoản đã tồn tại',
            'nd_matKhau.required'=>'Bạn chưa nhập mật khẩu',
            'nd_dienThoai.required'=>'Bạn chưa nhập số điện thoại'
        ]);
        // $this->validate($request,[
        //     'nd_hoTen' => ['required', 'string'],
        //     'nd_email' => ['required', 'string', 'email', 'max:255', 'unique:nguoidung'],
        //     'nd_taiKhoan' => ['required','string', 'max:20','unique:nguoidung'],
        //     'nd_matKhau' => ['required', 'string', 'min:6'],
        //     'nd_dienThoai' => ['required', 'numeric', 'min:10'],
        // ]);
        $nguoidung = new Nguoidung();
        $nguoidung->nd_ma = $request->nd_ma;
        $nguoidung->nd_hoTen = $request->nd_hoTen;
        $nguoidung->nd_taiKhoan = $request->nd_taiKhoan;
        $nguoidung->nd_matKhau = $request->nd_matKhau;
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
        $nguoidung = Nguoidung::where("nd_ma",  $id)->first();
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
            'nd_hoTen' =>'required|string',
            'nd_email' => 'required|string|email|max:255',
            'nd_matKhau' => 'required|string|min:6',
            'nd_dienThoai' =>'required|numeric|min:10',
            'nd_taiKhoan' =>'required|string|max:20',
            
        ],[
            'nd_hoTen.required'=>'Bạn chưa nhập họ tên',
            'nd_email.required'=>'Bạn chưa nhập email',
            'nd_matKhau.required'=>'Bạn chưa nhập mật khẩu',
            'nd_taiKhoan.required'=>'Bạn chưa nhập tài khoản',
            'nd_dienThoai.required'=>'Bạn chưa nhập số điện thoại'
        ]);
        $nguoidung = Nguoidung::where("nd_ma",  $id)->first();
        $nguoidung->nd_hoTen = $request->nd_hoTen;
        $nguoidung->nd_taiKhoan = $request->nd_taiKhoan;
        $nguoidung->nd_matKhau = $request->nd_matKhau;
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
        //dd($request->nd_ma);
        //$nguoidung = Nguoidung::findOrFail($request->nd_ma);
        
        $nguoidung = Nguoidung::where("nd_ma",  $id)->first();
        $nguoidung->delete();
        Session::flash('alert-danger', 'Xoá thành công!');
        return redirect()->route('danhsachnguoidung.index');
   
    }
    public function print()
    {
        $ds_nguoidung = Nguoidung::all();
        $ds_quyen = Quyen::all();
        $data = [
            'danhsachnguoidung' => $ds_nguoidung,
            'danhsachquyen'=>$ds_quyen,
        ];
    //$ds_loai    = Loai::all();
        return view('backend.nguoidung.print')
            ->with('danhsachnguoidung', $ds_nguoidung)
            ->with('danhsachquyen', $ds_quyen);
    }
}

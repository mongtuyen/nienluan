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
        return view('nguoidung.index')
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
        return view('nguoidung.create')
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
        Session::flash('alert-info', 'Thêm thảnh công!');
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

        return view('nguoidung.edit')
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
        $nguoidung = Nguoidung::where("nd_ma",  $id)->first();
        $nguoidung->delete();

        Session::flash('alert-danger', 'Xoá thành công!');
        return redirect()->route('danhsachnguoidung.index');
   
    }
}

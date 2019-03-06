<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sanpham;
use App\Loai;
use Session;
class SanphamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_sanpham = Sanpham::all(); 
       
        return view('backend.sanpham.index')
            ->with('danhsachsanpham', $ds_sanpham);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ds_loai = Loai::all(); 
        return view('backend.sanpham.create',['danhsachloai'=>$ds_loai]);
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
            'sp_ten' =>'required|unique:sanpham',
        ],[
            'sp_ten.required'=>'Bạn chưa nhập tên nông sản',
            'sp_ten.unique'=>'Tên nông sản đã tồn tại'
        ]);
        $sanpham=new Sanpham();
        $sanpham->sp_ten=$request->sp_ten;
        $sanpham->l_ma = $request->l_ma;
        $sanpham->save();
        Session::flash('alert-info', 'Thêm thành công!');
        return redirect()->route('danhsachsanpham.index');  
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
        $sanpham = Sanpham::where("sp_ma", $id)->first();
        $ds_loai=Loai::all();
        //return view('backend.sanpham.edit')
          //  ->with('sanpham', $sanpham)
            //->with('danhsachloai',$ds_loai);
            return view('backend.sanpham.edit',['sanpham'=>$sanpham,'danhsachloai'=>$ds_loai]);
    
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
            'sp_ten' =>'required|string',
        ],[
            'sp_ten.required'=>'Bạn chưa nhập tên nông sản',
        ]);
        $sanpham = Sanpham::where("sp_ma", $id)->first();
        $sanpham->sp_ten = $request->sp_ten;
        $sanpham->l_ma=$request->l_ma;
        $sanpham->save();
        Session::flash('alert-info', 'Cập nhật thành công!');
        return redirect()->route('danhsachsanpham.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sanpham = Sanpham::where("sp_ma",  $id)->first();
        $sanpham->delete();
        Session::flash('alert-danger', 'Xoá dữ liệu thành công!');
        return redirect()->route('danhsachsanpham.index');  
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Loai;
use Validator;
class LoaiController extends Controller
{
    public function index()
    {
        $ds_loai = Loai::paginate(5);
        
        return view('backend.loai.index')
            ->with('danhsachloai', $ds_loai);
    }

    public function create() {
        return view('backend.loai.create');
 
    }

    public function store(Request $request) {
        $validation = $request->validate([
            'l_ten' =>'required|string|unique:loai',
        ],[
            'l_ten.required'=>'Bạn chưa nhập tên loại nông sản',
            'l_ten.unique'=>'Loại nông sản đã tồn tại'
        ]);
        $loai=new Loai();
        $loai->l_ten=$request->l_ten;
        $loai->save();
        Session::flash('alert-info','Thêm thành công!');
        return redirect()->route('danhsachloai.index');
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loai = Loai::where("l_ma", $id)->first();
        return view('backend.loai.edit')->with('loai', $loai);
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
            'l_ten' =>'required|string',
        ],[
            'l_ten.required'=>'Bạn chưa nhập tên loại nông sản'
        ]);
        $loai = Loai::where("l_ma", $id)->first();
        $loai->l_ten = $request->l_ten;
        $loai->save();

        Session::flash('alert-info', 'Cập nhật thành công!');
        return redirect()->route('danhsachloai.index');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loai = Loai::where("l_ma",  $id)->first();
        $loai->delete();

        Session::flash('alert-danger', 'Xoá dữ liệu thành công!');
        return redirect()->route('danhsachloai.index');
    }

    // public function destroy(Request $request)
    // {
    //    //dd($request->l_ma);
    //     $loai = Loai::findOrFail($request->l_ma);
    //     $loai->delete();
    //     Session::flash('alert-info', 'Xóa thành công!');
    //     return redirect()->route('danhsachloai.index');
        
    }


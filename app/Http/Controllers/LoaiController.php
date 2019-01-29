<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Loai;
class LoaiController extends Controller
{
    public function index()
    {
        // Eloquent Model de lay du lieu
        //$ds_loai = Loai::all(); // SELECT * FROM cusc_loai

        // Query Builder
        $ds_loai = DB::table('loai')->get();
        
        return view('loai.index')
            ->with('danhsachloai', $ds_loai);
    }

    public function create() {
        return view('loai.create');
 
    }

    public function store(Request $request) {
        $loai=new Loai();
        $loai->l_ma=$request->l_ma;
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
        return view('loai.edit')->with('loai', $loai);
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
        // $validator = Validator::make($request->all(), [
        //     'l_ten' => 'required|unique:cusc_loai|max:60',
       // ]);

        // if ($validator->fails()) {
        //     return redirect(route('danhsachloai.edit', ['id' => $id]))
        //                 ->withErrors($validator)
        //                 ->withInput();
        // }

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
}

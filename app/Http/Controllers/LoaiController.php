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
        $ds_loai = Loai::paginate(5);
        
        return view('backend.loai.index')
            ->with('danhsachloai', $ds_loai);
    }

    public function create() {
        return view('backend.loai.create');
 
    }

    public function store(Request $request) {
        Loai::create($request->all());
        return back();
        // $loai=new Loai();
        // // $loai->l_ma=$request->l_ma;
        // $loai->l_ten=$request->l_ten;
        // $loai->save();
        // Session::flash('alert-info','Thêm thành công!');
        // return redirect()->route('danhsachloai.index');
   
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
    // public function update(Request $request, $id)
    // {
    //     // $validator = Validator::make($request->all(), [
    //     //     'l_ten' => 'required|unique:cusc_loai|max:60',
    //    // ]);

    //     // if ($validator->fails()) {
    //     //     return redirect(route('danhsachloai.edit', ['id' => $id]))
    //     //                 ->withErrors($validator)
    //     //                 ->withInput();
    //     // }

    //     $loai = Loai::where("l_ma", $id)->first();
    //     $loai->l_ten = $request->l_ten;
    //     $loai->save();

    //     Session::flash('alert-info', 'Cập nhật thành công!');
    //     return redirect()->route('danhsachloai.index');
    // }

    public function update(Request $request){
        $messages = [
		    'required' => 'Bạn chưa nhập tên loại',
		];
		$validator = Validator::make($request->all(), [
            'ten_lsp'     => 'required'

        ], $messages);

        if ($validator->fails()) {
            return redirect()->route('danhsachloai.create')
                    ->withErrors($validator)
                    ->withInput();
        } else {
       $loai = Loai::findOrFail($request->l_ma);
       $loai->update($request->all());
        //return back();
        Session::flash('alert-info', 'Cập nhật thành công!');
        return redirect()->route('danhsachloai.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     $loai = Loai::where("l_ma",  $id)->first();
    //     $loai->delete();

    //     Session::flash('alert-danger', 'Xoá dữ liệu thành công!');
    //     return redirect()->route('danhsachloai.index');
    // }

    public function destroy(Request $request)
    {
       //dd($request->l_ma);
        $loai = Loai::findOrFail($request->l_ma);
        $loai->delete();
        Session::flash('alert-info', 'Xóa thành công!');
        return redirect()->route('danhsachloai.index');
        
    }
}

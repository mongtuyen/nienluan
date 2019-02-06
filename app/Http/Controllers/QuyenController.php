<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Quyen;
use Session;
class QuyenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_quyen = DB::table('quyen')->get();
        
        return view('backend.quyen.index')
            ->with('danhsachquyen', $ds_quyen);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backdend.quyen.create');
 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quyen=new Quyen();
        $quyen->q_ma=$request->q_ma;
        $quyen->q_ten=$request->q_ten;
        $quyen->save();
        Session::flash('alert-info','Thêm thành công!');
        return redirect()->route('danhsachquyen.index');
   
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
        $quyen = Quyen::where("q_ma", $id)->first();
        return view('backdend.quyen.edit')->with('quyen', $quyen);
    
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
        $quyen = Quyen::where("q_ma", $id)->first();
        $quyen->q_ten = $request->q_ten;
        $quyen->save();

        Session::flash('alert-info', 'Cập nhật thành công!');
        return redirect()->route('danhsachquyen.index');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quyen = Quyen::where("q_ma",  $id)->first();
        $quyen->delete();

        Session::flash('alert-danger', 'Xoá dữ liệu thành công!');
        return redirect()->route('danhsachquyen.index');
    
    }
}

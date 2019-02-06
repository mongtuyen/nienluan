<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Baidang;
use App\Sanpham;
use Session;
use Storage;
use App\Nguoidung;
class BaidangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ds_baidang = Baidang::paginate(5);
        return view('backend.baidang.index')
            ->with('danhsachbaidang', $ds_baidang);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$ds_linhvuc=Linhvuc::all();
        $ds_sanpham = Sanpham::all();
        $ds_nguoidung = Nguoidung::all();
        return view('backend.baidang.create',['danhsachsanpham'=>$ds_sanpham,'danhsachnguoidung'=>$ds_nguoidung]);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $baidang=new Baidang();
        $baidang->bd_ma=$request->bd_ma;
        $baidang->bd_tieuDe=$request->bd_tieuDe;
        $baidang->bd_ngayDang=$request->bd_ngayDang;
        $baidang->bd_ngayHetHan=$request->bd_ngayHetHan;
        $baidang->bd_trangThaisp=$request->bd_trangThaisp;
        $baidang->bd_noiDung=$request->bd_noiDung;
        $baidang->bd_gia=$request->bd_gia;
        $baidang->bd_khoiLuong=$request->bd_khoiLuong;
        $baidang->bd_loai=$request->bd_loai;
        $baidang->nd_ma=$request->nd_ma;
        $baidang->sp_ma=$request->sp_ma;
        if($request->hasFile('bd_hinh'))
        {
            $file = $request->bd_hinh;

            // Lưu tên hình vào column sp_hinh
            $baidang->bd_hinh = $file->getClientOriginalName();
            
            // Chép file vào thư mục "photos"
            $fileSaved = $file->storeAs('public/photos', $baidang->bd_hinh);
        }
        else{
            $baidang->bd_hinh="";
        }
        $baidang->save();
        Session::flash('alert-info','Thêm thành công!');
        return redirect()->route('danhsachbaidang.index');
    
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
        $baidang = Baidang::where("bd_ma",  $id)->first();
        $ds_nguoidung = Nguoidung::all();
        $ds_sanpham=Sanpham::all();
        return view('backend.baidang.edit',['baidang'=>$baidang,'danhsachsanpham'=>$ds_sanpham,'danhsachnguoidung'=>$ds_nguoidung]);
    
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
        $baidang = Baidang::where("bd_ma",  $id)->first();
        $baidang->bd_ma=$request->bd_ma;
        $baidang->bd_tieuDe=$request->bd_tieuDe;
        $baidang->bd_ngayDang=$request->bd_ngayDang;
        $baidang->bd_ngayHetHan=$request->bd_ngayHetHan;
        $baidang->bd_trangThaisp=$request->bd_trangThaisp;
        $baidang->bd_noiDung=$request->bd_noiDung;
        $baidang->bd_gia=$request->bd_gia;
        $baidang->bd_khoiLuong=$request->bd_khoiLuong;
        $baidang->bd_loai=$request->bd_loai;
        $baidang->nd_ma=$request->nd_ma;
        $baidang->sp_ma=$request->sp_ma;
        if($request->hasFile('bd_hinh'))
        {
            Storage::delete('public/photos/' . $baidang->bd_hinh);

            $file = $request->bd_hinh;

            // Lưu tên hình vào column sp_hinh
            $baidang->bd_hinh = $file->getClientOriginalName();
            
            // Chép file vào thư mục "photos"
            $fileSaved = $file->storeAs('public/photos', $baidang->bd_hinh);
        }
        else{
            $baidang->bd_hinh="";
        }
        $baidang->save();
        Session::flash('alert-info','Cập nhật thành công!');
        return redirect()->route('danhsachbaidang.index');
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $baidang = Baidang::where("bd_ma",  $id)->first();
        if(empty($baiviet) == false)
        {
            Storage::delete('public/photos/' . $baidang->bd_hinh);
        }
        $baidang->delete();
        Session::flash('alert-info', 'Xóa thành công!');
        return redirect()->route('danhsachbaidang.index');
    
    }
}

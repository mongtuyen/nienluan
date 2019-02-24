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
        $ds_sanpham=Sanpham::all();
        $ds_nguoidung=Nguoidung::all();
        $ds_baidang = Baidang::paginate(5);
        return view('backend.baidang.index')
            ->with('danhsachbaidang', $ds_baidang)
            ->with('danhsachsanpham',$ds_sanpham)
            ->with('danhsachnguoidung',$ds_nguoidung);
       
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
        return view('backend.baidang.create')
        ->with('danhsachsanpham',$ds_sanpham)
        ->with('danhsachnguoidung',$ds_nguoidung);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validation = $request->validate([
        //     'bd_hinh' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048',
        //     // Cú pháp dùng upload nhiều file
        //     //'sp_hinhanhlienquan.*' => 'file|image|mimes:jpeg,png,gif,webp|max:2048'
        // ]);
        try{
        $baidang=new Baidang();
        $baidang->bd_ma=$request->bd_ma;
        $baidang->bd_tieuDe=$request->bd_tieuDe;
        $baidang->bd_ngayDang=$request->bd_ngayDang;
        $baidang->bd_noiDung=$request->bd_noiDung;
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
        $baidang->bd_khoiLuong=$request->bd_khoiLuong;
        $baidang->bd_gia=$request->bd_gia;
        $baidang->bd_ngayHetHan=$request->bd_ngayHetHan;
        $baidang->bd_trangThaisp=$request->bd_trangThaisp;
        $baidang->bd_loai=$request->bd_loai;
        $baidang->nd_ma=$request->nd_ma;
        $baidang->sp_ma=$request->sp_ma;
        $baidang->save();
        Session::flash('alert-info','Thêm thành công!');
        return redirect()->route('danhsachbaidang.index');
    }catch(QueryException $ex)
    {
        return response([
            'error' => true, 'message' => $ex->getMessage()
        ], 500);
    }
    
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
        return view('backend.baidang.edit')
            ->with('baidang', $baidang)
            ->with('danhsachsanpham',$ds_sanpham)
            ->with('danhsachnguoidung',$ds_nguoidung);
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
    public function printmua()
    {
        $ds_sanpham = Sanpham::all();
        $ds_nguoidung    = Nguoidung::all();
        $ds_baidang    = Baidang::where('bd_loai','like',"1")->paginate(5);
        
        $data = [
            'danhsachsanpham' => $ds_sanpham,
            'danhsachbaidang'    => $ds_baidang,
            'danhsachnguoidung'    => $ds_nguoidung,
        ];
        return view('backend.baidang.printmua')
            ->with('danhsachbaidang', $ds_baidang)
            ->with('danhsachsanpham', $ds_sanpham)
            ->with('danhsachnguoidung', $ds_nguoidung);
    }
    public function printban()
    {
        $ds_sanpham = Sanpham::all();
        $ds_nguoidung    = Nguoidung::all();
        $ds_baidang    = Baidang::where('bd_loai','like',"2")->paginate(5);
        
        $data = [
            'danhsachsanpham' => $ds_sanpham,
            'danhsachbaidang'    => $ds_baidang,
            'danhsachnguoidung'    => $ds_nguoidung,
        ];
        return view('backend.baidang.printban')
            ->with('danhsachbaidang', $ds_baidang)
            ->with('danhsachsanpham', $ds_sanpham)
            ->with('danhsachnguoidung', $ds_nguoidung);
    }
    function timkiem(Request $request){
        $tukhoa=$request->tukhoa;
        $ds_sanpham = Sanpham::all();
        $ds_nguoidung    = Nguoidung::all();
        $ds_baidang= Baidang::where('bd_tieuDe','like',"%tukhoa%")->orWhere('bd_noiDung','like',"%tukhoa%")->take(5)->paginate(5);
        return view('backend.baidang.timkiem')
        ->with('danhsachbaidang', $ds_baidang)
        ->with('tukhoa',$tukhoa)
        ->with('danhsachsanpham', $ds_sanpham)
        ->with('danhsachnguoidung', $ds_nguoidung);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Baidang;
use App\Sanpham;
use Session;
use Storage;
use App\Nguoidung;
use App\Hinhanh;
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
        $validation = $request->validate([
            'bd_hinh' => 'file|image|mimes:jpeg,png,gif,webp|max:2048',
            'bd_hinhanhlienquan.*' => 'file|image|mimes:jpeg,png,gif,webp|max:2048',
            'bd_tieuDe' => 'required|string',
            'bd_noiDung' => 'required'
        ]);
        // $this->validate($request,[
        //     'bd_tieuDe' => ['required', 'string'],
        //     'bd_noiDung' => ['required'],
        // ]);
      
        $baidang = new Baidang();
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
        
         
        $baidang->bd_khoiLuong=$request->bd_khoiLuong;
        $baidang->bd_gia=$request->bd_gia;
        $baidang->bd_ngayHetHan=$request->bd_ngayHetHan;
        $baidang->bd_trangThaisp=$request->bd_trangThaisp;
        $baidang->bd_loai=$request->bd_loai;
        $baidang->nd_ma=$request->nd_ma;
        $baidang->sp_ma=$request->sp_ma;
        $baidang->save();
        // Lưu hình ảnh liên quan
        if($request->hasFile('bd_hinhanhlienquan')) {
            $files = $request->bd_hinhanhlienquan;

            // duyệt từng ảnh và thực hiện lưu
            foreach ($request->bd_hinhanhlienquan as $index => $file) {
                
                $file->storeAs('public/photos', $file->getClientOriginalName());

                // Tạo đối tưọng HinhAnh
                $hinhAnh = new Hinhanh();
                $hinhAnh->bd_ma = $baidang->bd_ma;
                $hinhAnh->ha_ma = ($index + 1);
                $hinhAnh->ha_ten = $file->getClientOriginalName();
                $hinhAnh->save();
            }
        }
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
        $ds_sanpham = Sanpham::all();
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
        $validation = $request->validate([
          // 'bd_hinh' => 'file|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
          //  'bd_hinhanhlienquan.*' => 'image|mimes:jpg,jpeg,png,gif,webp|max:2048',
            'bd_tieuDe' => 'required|string',
            'bd_noiDung' => 'required'
        ]);
        
        $baidang = Baidang::where("bd_ma",  $id)->first();
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
        // Lưu hình ảnh liên quan
        if($request->hasFile('bd_hinhanhlienquan')) {
            // DELETE các dòng liên quan trong table `HinhAnh`
            foreach($baidang->hinhAnh()->get() as $hinhAnh)
            {
                // Xóa hình cũ để tránh rác
                Storage::delete('public/photos/' . $hinhAnh->ha_ten);

                // Xóa record
                $hinhAnh->delete();
            }

            $files = $request->bd_hinhanhlienquan;

            // duyệt từng ảnh và thực hiện lưu
            foreach ($request->bd_hinhanhlienquan as $index => $file) {
                
                $file->storeAs('public/photos', $file->getClientOriginalName());

                // Tạo đối tưọng HinhAnh
                $hinhAnh = new Hinhanh();
                $hinhAnh->bd_ma = $baidang->bd_ma;
                $hinhAnh->ha_ma = ($index + 1);
                $hinhAnh->ha_ten = $file->getClientOriginalName();
                $hinhAnh->save();
            }
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
        if(empty($baidang) == false)
        {
            // DELETE các dòng liên quan trong table `HinhAnh`
            foreach($baidang->hinhAnh()->get() as $hinhAnh)
            {
                // Xóa hình cũ để tránh rác
                Storage::delete('public/photos/' . $hinhAnh->ha_ten);

                // Xóa record
                $hinhAnh->delete();
            }

            // Xóa hình cũ để tránh rác
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

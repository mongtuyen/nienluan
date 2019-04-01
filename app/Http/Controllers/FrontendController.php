<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Sanpham;
use App\User;
use App\Baidang;
use App\Loai;
use App\Nguoidung;
use Session;
use Storage;
use App\Hinhanh;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $ds_top3_newest_bd = Baidang::where('bd_loai','like',"1")->orWhere('bd_loai','like',"2")->orderBy('bd_ngayDang','desc')->take(3)->get();

        $danhsachloai = Loai::all();
        $danhsachbaidang = Baidang::where('bd_loai','like',"1")->orWhere('bd_loai','like',"2")->orderBy('bd_ngayDang','desc')->paginate(10);
       // $mua=Baidang::where('bd_loai','like',"1")->orderBy('bd_ngayDang','desc')->paginate(10);

        //$danhsachbaidang=DB::table('baidang')->orderBy('bd_ngayDang','desc');
        //$danhsachbaidang1 = $this->searchTin($request);
        // $danhsachhinhanhlienquan = DB::table('hinhanh')
        //     ->whereIn('bd_ma', $danhsachbaidang1->pluck('bd_ma')->toArray())
        //     ->get();
        return view('frontend.pages.home')
            ->with('danhsachloai', $danhsachloai)
            ->with('danhsachbaidang',$danhsachbaidang)
           ->with('danhsachbaidangmoinhat', $ds_top3_newest_bd);
    }
    public function baidang($id)
    {
        //$baidang = Baidang::find($id);
        $nguoidung = DB::table('users')->join('baidang', 'baidang.nd_ma','=','users.nd_ma')->where('bd_ma', $id)->first();      
        $baidang = Baidang::where("bd_ma",  $id)->first();
        // $danhsachhinhanhlienquan = DB::table('hinhanh')
        //                         ->where('bd_ma', $id)
        //                         ->get();
        $ds_top3_newest_bd = Baidang::where('bd_loai','like',"1")->orWhere('bd_loai','like',"2")->orderBy('bd_ngayDang','desc')->take(3)->get();
        //$bdlienquan=Baidang::where('sp_ma',$baidang->sp_ma)->take(4)->get();
        $danhsachloai = Loai::all();
        $hinhanhlienquan=Baidang::find($id)->hinhAnh()->get();
        return view('frontend.pages.tin-detail')
            ->with('baidang', $baidang)
            ->with('danhsachloai', $danhsachloai)
            ->with('hinhanhlienquan',$hinhanhlienquan)
            ->with('nguoidung',$nguoidung)
            ->with('danhsachbaidangmoinhat', $ds_top3_newest_bd);     
    }

    public function chitiettinmua($id)
    {
        $nguoidung = DB::table('users')->join('baidang', 'baidang.nd_ma','=','users.nd_ma')->where('bd_ma', $id)->first();      
        $baidang = Baidang::where("bd_ma",  $id)->first();
        $danhsachloai = Loai::all();
        return view('frontend.pages.tin-details')
            ->with('baidang', $baidang)
            ->with('danhsachloai', $danhsachloai)
            ->with('nguoidung',$nguoidung);
    }
    public function contact()
    {
        return view('frontend.pages.contact');
        
    }
    
    public function tinmua(Request $request)
    {
        $ds_top3_newest_bd = Baidang::where('bd_loai','like',"1")->orWhere('bd_loai','like',"2")->orderBy('bd_ngayDang','desc')->take(3)->get();

        $danhsachloai = Loai::all();
        $danhsachbaidang = Baidang::where('bd_loai','like',"1")->orderBy('bd_ngayDang','desc')->paginate(10);
        return view('frontend.pages.tinmua')
        ->with('danhsachloai', $danhsachloai)
        ->with('danhsachbaidangmoinhat', $ds_top3_newest_bd)
        ->with('danhsachbaidang',$danhsachbaidang);
        
    }
    public function tinban(Request $request)
    {
        $ds_top3_newest_bd = Baidang::where('bd_loai','like',"1")->orWhere('bd_loai','like',"2")->orderBy('bd_ngayDang','desc')->take(3)->get();

        $danhsachloai = Loai::all();
        $danhsachbaidang = Baidang::where('bd_loai','like',"2")->orderBy('bd_ngayDang','desc')->paginate(10);
        return view('frontend.pages.tinban')
        ->with('danhsachloai', $danhsachloai)
        ->with('danhsachbaidangmoinhat', $ds_top3_newest_bd)
        
        ->with('danhsachbaidang',$danhsachbaidang);
        
    }
   
    public function gettinban(){
        $danhsachloai = Loai::all();
        $danhsachsanpham=Sanpham::all();
        return view('frontend.baidang.ban-create')
        ->with('danhsachsanpham',$danhsachsanpham)
        ->with('danhsachloai', $danhsachloai);
    }
    public function posttinban(Request $request){
        
        $validation = $request->validate([
            'bd_hinh' => 'file|image|mimes:jpeg,png,gif,webp|max:2048',
            'bd_hinhanhlienquan.*' => 'file|image|mimes:jpeg,png,gif,webp|max:2048',
            'bd_tieuDe' => 'required|string',
            'bd_noiDung' => 'required'
        ],
        [   'bd_tieuDe.required'=>'Bạn chưa nhập tiêu đề',
            'bd_noiDung.required'=>'Bạn chưa nhập nội dung'
        ]
        );
        $baidang = new Baidang();
        $baidang->bd_tieuDe=$request->bd_tieuDe;
        $baidang->bd_noiDung=$request->bd_noiDung;
        if($request->hasFile('bd_hinh'))
        {
            $file = $request->bd_hinh;
            $baidang->bd_hinh = $file->getClientOriginalName();
            $fileSaved = $file->storeAs('public/photos', $baidang->bd_hinh);
        }
        
         
        $baidang->bd_khoiLuong=$request->bd_khoiLuong;
        $baidang->bd_gia=$request->bd_gia;
        $baidang->bd_ngayHetHan=$request->bd_ngayHetHan;
        $baidang->bd_trangThaisp=$request->bd_trangThaisp;
        $baidang->bd_loai=2;
        $baidang->nd_ma = Auth::user()->nd_ma;
        $baidang->sp_ma=$request->sp_ma;
        $baidang->save();
        if($request->hasFile('bd_hinhanhlienquan')) {
            $files = $request->bd_hinhanhlienquan;
            foreach ($request->bd_hinhanhlienquan as $index => $file) {
                $file->storeAs('public/photos', $file->getClientOriginalName());
                $hinhAnh = new Hinhanh();
                $hinhAnh->bd_ma = $baidang->bd_ma;
                $hinhAnh->ha_ma = ($index + 1);
                $hinhAnh->ha_ten = $file->getClientOriginalName();
                $hinhAnh->save();
            }
        }
        Session::flash('alert-info','Thêm thành công!');
        return redirect()->route('frontend.tinban');
    }
    public function gettinmua(){
        $danhsachloai = Loai::all();
        $danhsachsanpham=Sanpham::all();
        return view('frontend.baidang.mua-create')
        ->with('danhsachsanpham',$danhsachsanpham)
        ->with('danhsachloai', $danhsachloai);
    }
    public function posttinmua(Request $request){
        $validation = $request->validate([
            'bd_hinh' => 'file|image|mimes:jpeg,png,gif,webp|max:2048',
            'bd_hinhanhlienquan.*' => 'file|image|mimes:jpeg,png,gif,webp|max:2048',
            'bd_tieuDe' => 'required|string',
            'bd_noiDung' => 'required'
        ],
        [   'bd_tieuDe.required'=>'Bạn chưa nhập tiêu đề',
            'bd_noiDung.required'=>'Bạn chưa nhập nội dung'
        ]
        );
        $baidang = new Baidang();
        $baidang->bd_tieuDe=$request->bd_tieuDe;
        $baidang->bd_noiDung=$request->bd_noiDung;         
        $baidang->bd_khoiLuong=$request->bd_khoiLuong;
        //$baidang->bd_gia=$request->bd_gia;
        $baidang->bd_ngayHetHan=$request->bd_ngayHetHan;
        $baidang->bd_loai=1;
        $baidang->nd_ma = Auth::user()->nd_ma;
        $baidang->sp_ma=$request->sp_ma;
        $baidang->save();
        Session::flash('alert-info','Thêm thành công!');
        return redirect()->route('frontend.tinmua');
    }

    public function gettinrau($id){
        $ds_top3_newest_bd = Baidang::where('bd_loai','like',"1")->orWhere('bd_loai','like',"2")->orderBy('bd_ngayDang','desc')->take(3)->get();
        
        $danhsachloai = Loai::all();
        $danhsachsanpham=Sanpham::all();
        //$danhsachbaidang = Baidang::where('sp_ma','like',"1")->orderBy('bd_ngayDang','desc')->paginate(10);
        $danhsachbaidang = Baidang::where("sp_ma", $id)->orderBy('bd_ngayDang','desc')->paginate(10);
        return view('frontend.pages.tinrau')
        ->with('danhsachsanpham',$danhsachsanpham)
        ->with('danhsachloai', $danhsachloai)
        ->with('danhsachbaidangmoinhat', $ds_top3_newest_bd)
        
        ->with('danhsachbaidang',$danhsachbaidang);
    }
    public function getall(){
        $ds_top3_newest_bd = Baidang::where('bd_loai','like',"1")->orWhere('bd_loai','like',"2")->orderBy('bd_ngayDang','desc')->take(3)->get();
        $tatcabaidang = Baidang::where('bd_loai','like',"1")->orWhere('bd_loai','like',"2")->orderBy('bd_ngayDang','desc')->paginate(10);
        
        $danhsachloai = Loai::all();
        $danhsachsanpham=Sanpham::all();
        //$danhsachbaidang = Baidang::where('sp_ma','like',"1")->orderBy('bd_ngayDang','desc')->paginate(10);
        //$danhsachbaidang = Baidang::where("sp_ma", $id)->orderBy('bd_ngayDang','desc')->paginate(10);
        return view('frontend.pages.tinall')
        ->with('danhsachsanpham',$danhsachsanpham)
        ->with('danhsachloai', $danhsachloai)
        ->with('danhsachbaidangmoinhat', $ds_top3_newest_bd)
        ->with('allbd',$tatcabaidang);
        
    }


    public function timkiembaidang(Request $request){
        $tukhoa=$request->tukhoa;
        $ds_top3_newest_bd = Baidang::where('bd_loai','like',"1")->orWhere('bd_loai','like',"2")->orderBy('bd_ngayDang','desc')->take(3)->get();
        $ds_sanpham = Sanpham::all();
        $danhsachloai = Loai::all();
        $ds_baidang= Baidang::where('bd_tieuDe','like',"%$tukhoa%")->orderBy('bd_ngayDang','desc')->paginate(5);
        return view('frontend.pages.timkiem')
            ->with('danhsachbaidang', $ds_baidang)
            ->with('tukhoa',$tukhoa)
            ->with('danhsachloai', $danhsachloai)
            ->with('danhsachbaidangmoinhat', $ds_top3_newest_bd)
            ->with('danhsachsanpham', $ds_sanpham);
    }
    public function timkiembaidang1(Request $request){
        $tukhoa=$request->tukhoa;
        $ds_top3_newest_bd = Baidang::where('bd_loai','like',"1")->orWhere('bd_loai','like',"2")->orderBy('bd_ngayDang','desc')->take(3)->get();
        $ds_sanpham = Sanpham::all();
        $danhsachloai = Loai::all();
        $ds_baidang= Baidang::where('bd_tieuDe','like',"%$tukhoa%")->orderBy('bd_ngayDang','desc')->paginate(5);
        return view('frontend.pages.timkiem2')
            ->with('danhsachbaidang', $ds_baidang)
            ->with('tukhoa',$tukhoa)
            ->with('danhsachloai', $danhsachloai)
            ->with('danhsachbaidangmoinhat', $ds_top3_newest_bd)
            ->with('danhsachsanpham', $ds_sanpham);
    }

}

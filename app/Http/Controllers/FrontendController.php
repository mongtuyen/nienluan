<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Sanpham;
use App\User;
use App\Baidang;
use App\Loai;
use App\Nguoidung;
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
        $danhsachloai = Loai::all();
        $danhsachbaidang = Baidang::all();
        //$danhsachbaidang=DB::table('baidang')->orderBy('bd_ngayDang','desc');
        $danhsachbaidang1 = $this->searchTin($request);
        $danhsachhinhanhlienquan = DB::table('hinhanh')
            ->whereIn('bd_ma', $danhsachbaidang1->pluck('bd_ma')->toArray())
            ->get();
        return view('frontend.pages.home')
            ->with('danhsachloai', $danhsachloai)
            ->with('danhsachbaidang',$danhsachbaidang)
            ->with('danhsachhinhanhlienquan', $danhsachhinhanhlienquan);
    }
    public function baidang($id)
    {
        //$baidang = Baidang::find($id);
        $nguoidung = DB::table('users')->join('baidang', 'baidang.nd_ma','=','users.nd_ma')->where('bd_ma', $id)->first();      
        //$baidang = DB::table('baidang')->where('bd_ma', $id)->first();
        $baidang = Baidang::where("bd_ma",  $id)->first();
        //$user = Auth::user();
        // $danhsachhinhanhlienquan = DB::table('hinhanh')
        //                         ->where('bd_ma', $id)
        //                         ->get();

        $bdlienquan=Baidang::where('sp_ma',$baidang->sp_ma)->take(4)->get();
        $danhsachloai = Loai::all();
        $hinhanhlienquan=Baidang::find($id)->hinhAnh()->get();
        return view('frontend.pages.tin-detail')
            ->with('baidang', $baidang)
            // ->with('danhsachhinhanhlienquan', $danhsachhinhanhlienquan)
            ->with('danhsachloai', $danhsachloai)
            ->with('hinhanhlienquan',$hinhanhlienquan)
            ->with('nguoidung',$nguoidung)
            ->with('bdlienquan',$bdlienquan);
         
            
        //     $nguoidung = User::where("nd_ma",  $id)->first();
        // $ds_quyen = Quyen::all();

        // return view('backend.nguoidung.edit')
        //     ->with('nguoidung', $nguoidung)
        //     ->with('danhsachquyen', $ds_quyen);
  
            
    }

    public function chitiettinmua($id)
    {
        $nguoidung = DB::table('users')->join('baidang', 'baidang.nd_ma','=','users.nd_ma')->where('bd_ma', $id)->first();      
        $baidang = Baidang::where("bd_ma",  $id)->first();
        $bdlienquan=Baidang::where('sp_ma',$baidang->sp_ma)->take(4)->get();
        $danhsachloai = Loai::all();
        return view('frontend.pages.tin-details')
            ->with('baidang', $baidang)
            ->with('danhsachloai', $danhsachloai)
            ->with('nguoidung',$nguoidung)
            ->with('bdlienquan',$bdlienquan);
         
        
  
            
    }
    public function contact()
    {
        return view('frontend.pages.contact');
        
    }
    public function about()
    {
        return view('frontend.pages.about');
    }
    public function tinmua(Request $request)
    {
        $danhsachloai = Loai::all();
        $danhsachbaidang = Baidang::where('bd_loai','like',"1")->paginate(5);
        return view('frontend.pages.tinmua')
        ->with('danhsachloai', $danhsachloai)
        ->with('danhsachbaidang',$danhsachbaidang);
        
    }
    public function tinban(Request $request)
    {
        $danhsachloai = Loai::all();
        $danhsachbaidang = Baidang::where('bd_loai','like',"2")->paginate(5);
        return view('frontend.pages.tinban')
        ->with('danhsachloai', $danhsachloai)
        ->with('danhsachbaidang',$danhsachbaidang);
        
    }
    private function searchTin(Request $request)
    {
        $query = DB::table('baidang')->select('*');
    
        $searchByLoaiMa = $request->query('searchByLoaiMa');
        if($searchByLoaiMa != null)
        {
            $query->where('sp_ma', $searchByLoaiMa);
        }
    
        $data = $query->get();
        return $data;
    }

    
}

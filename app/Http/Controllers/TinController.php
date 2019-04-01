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

class TinController extends Controller
{
    //lọc tin mua theo loai
    public function gettinmua($id){
        $ds_top3_newest_bd = Baidang::where('bd_loai','like',"2")->orwhere('bd_loai','like',"1")->orderBy('bd_ngayDang','desc')->take(3)->get();
        
        $danhsachloai = Loai::all();
        $danhsachsanpham=Sanpham::all();
        $danhsachbaidang = Baidang::where("sp_ma", $id)->orderBy('bd_ngayDang','desc')->paginate(10);
        return view('frontend.pages.tinmua')
        ->with('danhsachsanpham',$danhsachsanpham)
        ->with('danhsachloai', $danhsachloai)
        ->with('danhsachbaidangmoinhat', $ds_top3_newest_bd)
        
        ->with('danhsachbaidang',$danhsachbaidang);
    }
   
//lọc tin bán theo loai
    public function gettinban($id){
        $ds_top3_newest_bd = Baidang::where('bd_loai','like',"1")->orwhere('bd_loai','like',"2")->orderBy('bd_ngayDang','desc')->take(3)->get();
        
        $danhsachloai = Loai::all();
        $danhsachsanpham=Sanpham::all();
        $danhsachbaidang = Baidang::where("sp_ma", $id)->orderBy('bd_ngayDang','desc')->paginate(10);
        return view('frontend.pages.tinban')
        ->with('danhsachsanpham',$danhsachsanpham)
        ->with('danhsachloai', $danhsachloai)
        ->with('danhsachbaidangmoinhat', $ds_top3_newest_bd)
        
        ->with('danhsachbaidang',$danhsachbaidang);
    }
   

}

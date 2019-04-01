<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Binhluan;
use App\Baidang;
use App\Daugia;
use Illuminate\Support\Facades\Auth;
use Session;
class CommentController extends Controller
{
    public function getXoa($id){
       


        //$bl=Binhluan::find($id);
        $bl = Binhluan::where("bl_ma",  $id)->first();
        $bl->delete();
        //return redirect('admin/danhsachbaidang.edit/'.$idbd);
        return redirect()->back();
    }
    public function postComment($id, Request $request){
        $idbd=$id;
       // $user = User::find(Auth::user()->id);
        //$bd=Baidang::find($id);
        $comment=new Binhluan();
        $comment->bd_ma=$idbd;
        $comment->nd_ma = Auth::user()->nd_ma;
        $comment->bl_noiDung=$request->bl_noiDung;
    
        $comment->save();
        //return redirect("chitiettin/$id/");
        Session::flash('alert-info', 'Bình luận thành công!');
        return back();
    }
    public function postGia($id, Request $request){
        $idbd=$id;
       // $user = User::find(Auth::user()->id);
        //$bd=Baidang::find($id);
        $gia=new Daugia();
        $gia->bd_ma=$idbd;
        $gia->nd_ma = Auth::user()->nd_ma;
        $gia->dg_noiDung=$request->dg_noiDung;
        $gia->dg_khoiLuong=$request->dg_khoiLuong;
        // $gia->dg_trangThai=$request->dg_trangThai;
        // $gia->dg_time=$request->dg_time;
        
        $gia->save();
        //return redirect("chitiettin/$id/");
        Session::flash('alert-info', 'Trả giá thành công!');
        return back();
    }
   
    public function updatedaugia(Request $request, $id)
    {
        
        $gia = Daugia::where("dg_ma", $id)->first();
        $gia->dg_trangThai=2;
        $gia->save();

        Session::flash('alert-info', 'Cập nhật thành công!');
        return redirect()->back();
    }
}

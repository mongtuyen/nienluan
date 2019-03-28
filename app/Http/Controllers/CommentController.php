<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Binhluan;
use App\Baidang;
use Illuminate\Support\Facades\Auth;
use Session;
class CommentController extends Controller
{
    public function getXoa($id,$idbd){
        $bl=Binhluan::find($id);
        $bl->delete();
        //return redirect('admin/danhsachbaidang.edit/'.$idbd);
        return back()->with('alert', 'Bình luận đã được xóa');
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
}

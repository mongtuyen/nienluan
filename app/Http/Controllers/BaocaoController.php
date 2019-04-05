<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DateTime;
use DB;
use Carbon\Carbon;
//use Carbon;

class BaocaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function baidang()
    {
        
        return view('backend.reports.baocao');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function baidangData(Request $request)
    {
        $parameter = [
            'tuNgay' => $request->tuNgay,
            'denNgay' => $request->denNgay
        ];
        $data = DB::select('
            SELECT date(bd.bd_ngayDang) as thoiGian
                , COUNT(bd.bd_ma) as tongbaidang
            FROM baidang bd
            WHERE date(bd.bd_ngayDang) BETWEEN :tuNgay AND :denNgay
            GROUP BY date(bd.bd_ngayDang)
        ', $parameter);
        return response()->json(array(
            'code'  => 200,
            'data' => $data,
        ));
    }

   
}

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
    public function index()
    {
        $date = getdate();
        $ngay = $date['wday'];
        $ngaydautuan = new DateTime(new Carbon);
        switch ($ngay) {
            case 0:
                $ngaydautuan -> modify('-6 day');
                break;
            case 1:
                $ngaydautuan = new DateTime(new Carbon);
                break;
            case 2:
                $ngaydautuan -> modify('-1 day');
                break;
            case 3:
                $ngaydautuan -> modify('-2 day');
                break;

            case 4:
                $ngaydautuan -> modify('-3 day');
                break;
            case 5:
                $ngaydautuan -> modify('-4 day');
                break;
            case 6:
                $ngaydautuan -> modify('-5 day');
                break;

            default:
                break;
        }

        return view('backend.reports.baocao');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/danhsachloai','LoaiController');
//Route::resource('/danhsachbaidang','BaidangController');
//Route::resource('/danhsachnguoidung','NguoidungController');
Route::resource('/danhsachsanpham','SanphamController');
Route::resource('/danhsachquyen','QuyenController');
Route::resource('/danhsachnguoidung','NguoidungController');
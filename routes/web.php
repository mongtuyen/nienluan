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
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
    Route::resource('/danhsachloai','LoaiController');
    Route::get('/danhsachbaidang/printmua', 'BaidangController@printmua')->name('danhsachbaidang.printmua');
    Route::get('/danhsachbaidang/printban', 'BaidangController@printban')->name('danhsachbaidang.printban');
    Route::post('timkiem', 'BaidangController@timkiem');
    Route::resource('/danhsachbaidang','BaidangController');
    Route::resource('/danhsachsanpham','SanphamController');
    Route::resource('/danhsachquyen','QuyenController');
    Route::get('/danhsachnguoidung/print', 'NguoidungController@print')->name('danhsachnguoidung.print');
   
    Route::resource('/danhsachnguoidung','NguoidungController');
    Route::get('/tongquan', 'BaocaoController@index')->name('tongquan');


});
Route::get('/', 'FrontendController@index')->name('frontend.home');
Route::get('/gioi-thieu', 'FrontendController@about')->name('frontend.about');

/*Route Đăng Nhập*/
// Route::get('/dang-nhap','U_LoginController@getLogin')->name('dang-nhap.getLogin');
// Route::post('/dang-nhap','U_LoginController@postLogin')->name('dang-nhap.postLogin');
// Route::get('/dang-xuat', function(){
// 	Auth::logout();
// 	return redirect()->route('frontend.home');
// })->name('dang-nhap.getLogout');
// /*Route Đăng Ký*/
// Route::get('/dang-ky','U_RegisterController@getRegister')->name('dang-ky.getRegister');
// Route::post('/dang-ky/xu-ly','U_RegisterController@postRegister')->name('dang-ky.postRegister');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

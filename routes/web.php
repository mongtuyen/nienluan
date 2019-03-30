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

Route::get('/admin/login', 'NguoidungController@getloginadmin')->name('adminlogin');
Route::post('/admin/login', 'NguoidungController@postloginadmin');

Route::get('/admin/logout', 'NguoidungController@adminlogout')->name('adminlogout');


Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){//
    Route::resource('/danhsachloai','LoaiController');
    Route::get('/danhsachbaidang/printmua', 'BaidangController@printmua')->name('danhsachbaidang.printmua');
    Route::get('/danhsachbaidang/printban', 'BaidangController@printban')->name('danhsachbaidang.printban');
    Route::post('/danhsachbaidang/timkiem', 'BaidangController@timkiem')->name('danhsachbaidang.timkiem');
    Route::resource('/danhsachbaidang','BaidangController');
    Route::resource('/danhsachsanpham','SanphamController');
    Route::resource('/danhsachquyen','QuyenController');
    Route::get('/danhsachnguoidung/print', 'NguoidungController@print')->name('danhsachnguoidung.print');   
    Route::resource('/danhsachnguoidung','NguoidungController');
    Route::get('/tongquan', 'BaocaoController@index')->name('tongquan');


});
Route::group(['prefix'=>'admin/comment','middleware'=>'adminLogin'],function(){//
    Route::get('xoa/{id}/{idbd}', 'CommentController@getXoa')->name('xoabinhluan');


});
//Frontend
Route::get('/trangchu', 'FrontendController@index')->name('frontend.home');

Route::get('/tinmua', 'FrontendController@tinmua')->name('frontend.tinmua');
Route::get('/tinban', 'FrontendController@tinban')->name('frontend.tinban');
Route::get('/lienhe', 'FrontendController@contact')->name('frontend.contact');


Route::get('dangnhap','NguoidungController@getLogin');
Route::post('dangnhap','NguoidungController@postLogin')->name('dangnhap.postLogin');
Route::get('/dangxuat','NguoidungController@getLogout');
Route::get('/dangky','NguoidungController@getRegister')->name('dangky.getRegister');
Route::post('/dangky','NguoidungController@postRegister')->name('dangky.postRegister');
Route::get('/nguoidung','NguoidungController@getUser');
Route::post('/nguoidung','NguoidungController@updateUser')->name('profile.updateProfile');
Route::post('/comment/{id}','CommentController@postComment')->name('comment');


Route::get('/chitiettin/{id}', 'FrontendController@baidang')->name('frontend.details');
Route::get('/chitiettinmua/{id}', 'FrontendController@chitiettinmua')->name('frontend.muadetails');

Route::group(['middleware'=>'userLogin'],function(){//
    Route::get('/dangtinban','FrontendController@gettinban');
    Route::post('/dangtinban','FrontendController@posttinban')->name('frontend.dangtinban');
    Route::get('/dangtinmua','FrontendController@gettinmua');
    Route::post('/dangtinmua','FrontendController@posttinmua')->name('frontend.dangtinmua');
});

Route::post('/usertimkiem', 'FrontendController@timkiembaidang')->name('frontend.timkiem');
    
Route::get('/loctin/{id}','FrontendController@gettinrau')->name('frontend.tinrau');
Route::get('/loctatca','FrontendController@getall')->name('frontend.tatcatin');

//Route::post('/rau','FrontendController@gettinrau');
//Route::get('/cu','FrontendController@gettincu')->name('frontend.tincu');


// Route::get('/dang-xuat', function(){
// 	Auth::logout();
// 	return redirect()->route('frontend.home');
// })->name('dang-nhap.getLogout');
/*Route Đăng Ký*/
// Route::get('/dang-ky','U_RegisterController@getRegister')->name('dang-ky.getRegister');
// Route::post('/dang-ky/xu-ly','U_RegisterController@postRegister')->name('dang-ky.postRegister');


// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

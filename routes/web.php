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

    Route::delete('/xoa/{id}', 'CommentController@getXoa')->name('xoabinhluan');
    Route::delete('/xoadaugia/{id}', 'CommentController@getXoaDG')->name('xoadaugia');
    Route::get('/baocao/baidang', 'BaoCaoController@baidang')->name('baocao.baidang');
    Route::get('/baocao/baidang/data', 'BaoCaoController@baidangData')->name('baocao.baidangdata');
});
//Route::group(['prefix'=>'admin/comment','middleware'=>'adminLogin'],function(){//
    
    
//});
//Frontend
Route::get('/trangchu', 'FrontendController@index')->name('frontend.home');

Route::get('/tinmua', 'FrontendController@tinmua')->name('frontend.tinmua');
Route::get('/tinban', 'FrontendController@tinban')->name('frontend.tinban');
Route::get('/lienhe', 'FrontendController@contact')->name('frontend.contact');


Route::get('/dangnhap','NguoidungController@getLogin');
Route::post('/dangnhap','NguoidungController@postLogin')->name('dangnhap.postLogin');
Route::get('/dangxuat','NguoidungController@getLogout');
Route::get('/dangky','NguoidungController@getRegister')->name('dangky.getRegister');
Route::post('/dangky','NguoidungController@postRegister')->name('dangky.postRegister');
Route::get('/nguoidung','NguoidungController@getUser');
Route::post('/nguoidung','NguoidungController@updateUser')->name('profile.updateProfile');

Route::post('/comment/{id}','CommentController@postComment')->name('comment');
Route::post('/nhapgia/{id}','CommentController@postGia')->name('nhapgia');


Route::get('/mytin','NguoidungController@getmytin');
Route::put('/updatemytin/{id}','NguoidungController@updatemytin')->name('profile.updatemytin');
Route::get('/edittinmua/{id}','NguoidungController@edittinmua')->name('profile.edittinmua');
Route::put('/updatedaugia/{id}', 'CommentController@updatedaugia')->name('capnhatdaugia');
Route::get('/editmytin/{id}','NguoidungController@editmytin')->name('profile.editmytin');



Route::get('/chitiettin/{id}', 'FrontendController@baidang')->name('frontend.details');
Route::get('/chitiettinmua/{id}', 'FrontendController@chitiettinmua')->name('frontend.muadetails');
//ban
Route::group(['middleware'=>'user3Login'],function(){
    Route::get('/dangtinban','FrontendController@gettinban');
    Route::post('/dangtinban','FrontendController@posttinban')->name('frontend.dangtinban');
   
});
//mua
Route::group(['middleware'=>'user2Login'],function(){
    Route::get('/dangtinmua','FrontendController@gettinmua');
    Route::post('/dangtinmua','FrontendController@posttinmua')->name('frontend.dangtinmua');
   
   
});
Route::post('/usertimkiem', 'FrontendController@timkiembaidang')->name('frontend.timkiem');
Route::post('/usertimkiemloai', 'FrontendController@timkiembaidang1')->name('frontend.timkiem1');
     
Route::get('/loctin/{id}','FrontendController@gettinrau')->name('frontend.tinrau');
Route::get('/loctatca','FrontendController@getall')->name('frontend.tatcatin');


Route::get('/loctinmua/{id}','TinController@gettinmua')->name('frontend.loctinmua');

Route::get('/loctinban/{id}','TinController@gettinban')->name('frontend.loctinban');




// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

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
use App\Theloai;
Route::get('/', function () {
    return view('welcome');
});
Route::get('admin','AdminController@index');
//Route Thể Loại
Route::get('theloai/danhsachajax','TheloaiController@getajax');
Route::get('theloai/danhsach','TheloaiController@Them');
Route::post('theloai/danhsach','TheloaiController@XuLyThemTL');
		// Route URL: admin/theloai/sua
Route::get('theloai/sua/{id}','TheloaiController@Sua');
Route::post('theloai/sua','TheloaiController@XuLySuaTL');
Route::get('theloai/xoa/{id}','TheloaiController@Xoa');


//Route Loại tin
Route::get('loaitin/danhsachajax','LoaitinController@getajax');
Route::get('loaitin/danhsach','LoaitinController@Them');
Route::get('loaitin/getTL','LoaitinController@loadTLajax');
Route::post('loaitin/danhsach','LoaitinController@XuLyThemTL');
		// Route URL: admin/theloai/sua
Route::get('loaitin/sua/{id}','TheloaiController@Sua');
Route::post('loaitin/sua/{id}','TheloaiController@XuLySuaTL');
Route::get('loaitin/xoa/{id}','TheloaiController@Xoa');


//Rote tin tức
Route::get('tintuc/danhsach','TintucController@getDS');
Route::get('tintuc/them','TintucController@Them');
Route::post('tintuc/them','TintucController@XuLyThemTL');
		// Route URL: admin/theloai/sua
Route::get('tintuc/sua/{id}','TintucController@Sua');
Route::post('tintuc/sua/{id}','TintucController@XuLySuaTL');
Route::get('tintuc/xoa/{id}','TintucController@Xoa');
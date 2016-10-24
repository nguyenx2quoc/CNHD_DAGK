<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::get('/ve-may-bay/san-bay','get_san_bayController@index');
Route::get('/ve-may-bay/danh-sach-chuyen-bay','danh_sach_chuyen_bayController@index');
Route::get('/test',function(){
   return view('testgd');
});
Route::post('/ve-may-bay/ma-dat-cho1','ma_dat_cho1Controller@index');
Route::post('/ve-may-bay/ma-dat-cho2','ma_dat_cho2Controller@index');
Route::get('/ve-may-bay/danh-sach-chang-bay','chang_bayController@index');
Route::post('/ve-may-bay/danh-sach-chang-bay','chang_bayController@them_chuyen_bay');
Route::get('/ve-may-bay/danh-sach-hanh-khach','hanh_khachController@xem_danh_sach_hanh_khach');
Route::post('/ve-may-bay/danh-sach-hanh-khach','hanh_khachController@them_hanh_khach');
Route::get('/ve-may-bay/thong-tin-ma-dat-cho','thong_tin_ma_dat_choController@xem_ma_dat_cho');
Route::post('/ve-may-bay/ma-dat-cho','thong_tin_ma_dat_choController@hoan_tat_dat_cho');
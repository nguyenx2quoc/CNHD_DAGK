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
Route::get('/ban-ve-may-bay/san-bay','get_san_bayController@index');
Route::get('/ban-ve-may-bay/danh-sach-chuyen-bay','danh_sach_chuyen_bayController@index');
Route::get('/test',function(){
   return view('testgd');
});
Route::post('/ban-ve-may-bay/phat-sinh-ma-dat-cho','dat_choController@index');
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
Route::get('/vx/test','Vx\TestController@token');

Route::get('/vx/test','Vx\TestController@test');


Route::post('/user/reg','User\RegController@reg');
Route::post('/user/login','User\LoginController@login')->Middleware('Checktoken');
Route::get('/user/centel','User\LoginController@centel');
Route::get('/user/kkk','User\LoginController@kkk');

//Route::get('/vx/kkk','Vx\TestController@kkk');


//登录
Route::post('/user/login','LoginController@login');
//注册
Route::post('/user/reg','RegController@reg');
//个人中心
Route::get('/user/center','CenterController@center')->middleware('verifytoken');
//签到
Route::get('/user/sign','CenterController@sign');
//详情
Route::get('/user/goods','GoodsController@goods')->middleware('verifytoken');
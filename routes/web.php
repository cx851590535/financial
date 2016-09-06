<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', function () {
    return view('login.index');
});

Route::post('/login/login','LoginController@login');

/*
 * 需要登录
 * */
Route::group(['middleware'=>'login'],function (){
    Route::get('/home/index','LoginController@index');//首页

    /*
     * 需要权限认证
     * */
    Route::group(['middleware'=>'permission'],function (){
        
    });
});

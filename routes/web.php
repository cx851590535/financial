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
Route::get('/','LoginController@index');
Route::post('/login/login','LoginController@login');

/*
 * 需要登录
 * */
Route::group(['middleware'=>'login'],function (){
    Route::get('/home/index','LoginController@home');//首页
    Route::get('/login/logout','LoginController@logout');//退出系统
    Route::post('/permission/refresh','PermissionController@refresh');//刷新权限

    /*
     * 需要权限认证
     * */
    Route::group(['middleware'=>'permission'],function (){

        Route::get('/permission/index','PermissionController@index');//权限信息
        Route::post('/permission/del','PermissionController@delete');//删除权限

    });
});

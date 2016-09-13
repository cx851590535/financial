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
Route::get('/permission/denied','LoginController@permissiondenied');
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

        /**
         * 权限相关
         * */
        Route::get('/permission/index','PermissionController@index');//权限信息
        Route::post('/permission/del','PermissionController@delete');//删除权限
        Route::post('/permission/add','PermissionController@add');//添加权限

        Route::get('/permission/role/show','PermissionController@roleshow');//权限分配页面
        Route::post('/permission/role/set','PermissionController@roleset');//权限分配功能
        Route::post('/permission/role/get','PermissionController@getPermissionByRole');//根据角色获取权限

    });
});

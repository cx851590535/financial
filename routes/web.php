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
        Route::post('/permission/modfy','PermissionController@add');//修改权限


        /* *
         * 权限分配相关
         * */
        Route::get('/permission/role/show','PermissionController@roleshow');//权限分配页面
        Route::post('/permission/role/set','PermissionController@roleset');//权限分配功能
        Route::post('/permission/role/get','PermissionController@getPermissionByRole');//根据角色获取权限


        /* *
         * 用户相关
         * */
        Route::get('/user/index','UserController@index');//用户列表
        Route::post('/user/del','UserController@delete');//删除用户
        Route::post('/user/forbid','UserController@forbid');//禁用
        Route::post('/user/add','UserController@add');//添加用户
        Route::post('/user/check','UserController@isused');//判断用户是否存在


        /* *
         * 角色相关
         * */
        Route::get('/role/index','RoleController@index');//角色列表
        Route::post('/role/add','RoleController@add');//角色添加
        Route::post('/role/del','RoleController@del');//角色删除


        /* *
         * 商品相关
         * */
        Route::get('/product/list','ProductController@getList');//商品列表
    });
});

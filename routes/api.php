<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//upload
Route::any('uploadPic','UploadController@uploadPic');
Route::any('removePic','UploadController@removePic');

/**
 * 虚拟主机类
 */
Route::group(['prefix' => 'virtualHost'], function () {

    //项目列表
    Route::any('dataList','VirtualHostController@dataList');

    //创建项目
    Route::post('create','VirtualHostController@create');

    //删除项目
    Route::post('delete','VirtualHostController@delete');
});

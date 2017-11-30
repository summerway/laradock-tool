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

//调试路由
Route::any('debug','DebugController@index');

Route::get('index', function () {
    return view('index');
})->name('index');


Route::get('/', function () {
    return view('index');
    //return redirect()->intended('index');
});

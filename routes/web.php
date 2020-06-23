<?php

use Illuminate\Support\Facades\Route;

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
Route::any('/left', function () {
    return view('hou.left');
});
Route::any('/banner_add', function () {
    return view('hou.banner_add');
});
Route::any('/fen_add', function () {
    return view('hou.fen_add');
});
Route::any('/hou_index',"HouController@hou_index");
Route::any('/banner',"HouController@banner");
Route::any('/banner_in',"HouController@banner_in");
Route::any('/banner_shan',"HouController@banner_shan");
Route::any('/banner_up',"HouController@banner_up");
Route::any('/banner_ups',"HouController@banner_ups");
Route::any('/banner_upd',"HouController@banner_upd");
Route::any('/fen_zhan',"FenController@fen_zhan");
Route::any('/fen_adds',"FenController@fen_adds");
Route::any('/fen_da',"FenController@fen_da");
Route::any('/fen_pu',"FenController@fen_pu");
Route::any('/fen_pus',"FenController@fen_pus");

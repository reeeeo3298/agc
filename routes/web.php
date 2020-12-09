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

//ログイン画面表示
Route::get('/','AgcController@index');

//ログイン処理
Route::get('/login','AgcController@login');

//ログアウト処理
Route::get('/logout','AgcController@logout');

//データ連携画面表示
Route::get('/import','AgcController@import_index');

//csvインポート処理
Route::post('/data_import','AgcController@import_input');

//csvダウンロード処理
Route::post('/csv_download','AgcController@csv_download_input');

//顧客管理画面表示
Route::get('/customer','AgcController@customer_index');

//検索ボタン押下
Route::get('/customer_search','AgcController@customer_search');

//詳細ボタン押下
Route::get('data_detail','AgcController@detail_index');

//詳細ボタン押下
Route::get('/edit','AgcController@edit_index');

//詳細モーダルからの修正ボタン押下
Route::post('/modal_data_edit','AgcController@modal_data_edit');
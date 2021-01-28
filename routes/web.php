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

//メインメニュー表示
Route::get('/mainmenu','AgcController@mainmenu_index');

//ログアウト処理
Route::get('/logout','AgcController@logout');

//データ連携画面表示
Route::get('/import','AgcController@import_index');

//データ更新画面表示
Route::get('/update','AgcController@update_index');

//データ更新処理
Route::post('/data_update','AgcController@update_input');

//よくある質問画面表示
Route::get('/faq','AgcController@faq_index');

//ENESAP用csvデータダウンロード画面表示
Route::get('/enesap','AgcController@enesap_index');

//ENESAP用csvデータダウンロード画面表示(代理店検索)
Route::get('/agency_view','AgcController@agency_view_index');

//ENESAP用csvデータダウンロード処理
Route::post('/download','AgcController@enesap_input');

//代理店マスタ画面表示
Route::get('/agency_master','AgcController@agency_master_index');

//代理店マスタ詳細ボタン押下
Route::get('agency_data_detail','AgcController@agency_detail_index');

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

//代理店の詳細モーダルからの修正ボタン押下
Route::post('/agency_modal_data_edit','AgcController@agency_modal_data_edit');

//代理店の追加モーダルからの登録ボタン押下
Route::post('/agency_modal_data_add','AgcController@agency_modal_data_add');

//セレクトボックスのデータ取得
Route::get('selectbox_get','AgcController@selectbox_get');
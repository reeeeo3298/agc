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

Route::get('/','AgcController@index');
Route::get('/login','AgcController@login');
Route::get('/import','AgcController@import_index');
Route::post('/data_import','AgcController@import_input');

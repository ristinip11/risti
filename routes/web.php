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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('payment', 'AcceptController');

Route::group(['prefix'=> 'confirmations'], function(){

    route::get('payment/{permintaan}', 'ConfirmController@edit')->name('confirmations.edit');
    route::post('store', 'ConfirmController@store')->name('confirmations.store');

});

Route::resource('categories', 'CategorieController');
Route::resource('controlling', 'ControllingController');

Route::group(['prefix' => 'permintaan'], function(){

    route::get('index', 'PermintaanController@index')->name('permintaan.index');
    route::put('update-status/{permintaan}', 'PermintaanController@update')->name('permintaan.update-status');
});



Route::get('pengajuan', 'PengajuanController@index')->name('pengajuan.index');
Route::get('pengajuan/edit/{categories}', 'PengajuanController@edit')->name('pengajuan.edit');
Route::post('pengajuan/store', 'PengajuanController@store')->name('pengajuan.store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

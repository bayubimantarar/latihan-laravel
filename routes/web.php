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
Route::group(['prefix' => 'kalkulator'], function(){
	Route::get('/', 'KalkulatorController@index')->name('kalkulator');
	Route::post('process', 'KalkulatorController@process')->name('kalkulator.process');
});

Route::group(['prefix' => 'lokasikerja'], function(){
	Route::get('/', 'LokasiKerjaController@index')->name('lokasikerja');
	Route::get('data', 'LokasiKerjaController@data')->name('lokasikerja.data');
	Route::get('singledata/{id}', 'LokasiKerjaController@singledata')->name('lokasikerja.singledata');
	Route::post('store', 'LokasiKerjaController@store')->name('lokasikerja.store');
	Route::put('update', 'LokasiKerjaController@update')->name('lokasikerja.update');
	Route::delete('destroy/{id}', 'LokasiKerjaController@destroy')->name('lokasikerja.destroy');
});

Route::group(['prefix' => 'unitkerja'], function(){
	Route::get('/', 'UnitKerjaController@index')->name('unitkerja');
	Route::get('singledata/{id}', 'UnitKerjaController@singledata')->name('unitkerja.singledata');
	Route::get('data', 'UnitKerjaController@data')->name('unitkerja.data');
	Route::post('store', 'UnitKerjaController@store')->name('unitkerja.store');
	Route::put('update', 'UnitKerjaController@update')->name('unitkerja.update');
	Route::delete('destroy/{id}', 'UnitKerjaController@destroy')->name('unitkerja.destroy');
});
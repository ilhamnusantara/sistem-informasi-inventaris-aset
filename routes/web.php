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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/jenis-belanja','JenisBelanjaController@index')->name('jBelanja');
Route::get('/create-JB','JenisBelanjaController@create')->name('jBelanja.create');
Route::post('/store-JB','JenisBelanjaController@store')->name('jBelanja.store');
Route::get('/edit-JB/{id_jenis}/edit','JenisBelanjaController@edit')->name('jBelanja.edit');
Route::put('/update-JB/{id_jenis}/update','JenisBelanjaController@update')->name('jBelanja.update');
Route::get('/delete-JB/{id_jenis}/delete','JenisBelanjaController@destroy')->name('jBelanja.delete');

Route::get('/dokumen','DokumenController@index')->name('dokumen');
Route::get('/create-Dokumen','DokumenController@create')->name('dokumen.create');
Route::post('/store-Dokumen','DokumenController@store')->name('dokumen.store');
Route::get('/edit-Dokumen/{id_dokumen}/edit','DokumenController@edit')->name('dokumen.edit');
Route::put('/edit-Dokumen/{id_dokumen}/update','DokumenController@update')->name('dokumen.update');
Route::get('/edit-Dokumen/{id_dokumen}/delete','DokumenController@destroy')->name('dokumen.delete');
Route::get('/filespk/{id_dokumen}/download','DokumenController@download')->name('dokumen.download');
Route::get('/filespk/{id_dokumen}','DokumenController@show')->name('dokumen.filespk');
//Route::get('filespk/download/{image_spk}','DokumenController@download')->name('dokumen.download');


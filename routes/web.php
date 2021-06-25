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
Route::get('/tester', 'HomeController@tester');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/jenis-belanja','JenisBelanjaController@index')->name('jBelanja');
Route::get('/create-JB','JenisBelanjaController@create')->name('jBelanja.create');
Route::get('/edit-JB/{id_jenis}/edit','JenisBelanjaController@edit')->name('jBelanja.edit');
Route::put('/update-JB/{id_jenis}/update','JenisBelanjaController@update')->name('jBelanja.update');
Route::get('/delete-JB/{id_jenis}/delete','JenisBelanjaController@destroy')->name('jBelanja.delete');

Route::get('/induk-belanja','IndukBelanjaController@index')->name('iBelanja');
Route::post('/store-IB','IndukBelanjaController@store')->name('iBelanja.store');
Route::get('/edit-IB/{id_induk}/edit','IndukBelanjaController@edit')->name('iBelanja.edit');
Route::put('/update-IB/{id_induk}/update','IndukBelanjaController@update')->name('iBelanja.update');
Route::get('/delete-IB/{id_induk}/delete','IndukBelanjaController@destroy')->name('iBelanja.delete');

Route::get('/sub-belanja','SubBelanjaController@index')->name('sBelanja');
Route::post('/store-SB','SubBelanjaController@store')->name('sBelanja.store');
Route::get('/edit-SB/{id_sub}/edit','SubBelanjaController@edit')->name('sBelanja.edit');
Route::put('/update-SB/{id_sub}/update','SubBelanjaController@update')->name('sBelanja.update');
Route::post('/store-JB','JenisBelanjaController@store')->name('jBelanja.store');


Route::get('/dokumen','DokumenController@index')->name('dokumen');
Route::get('/create-Dokumen','DokumenController@create')->name('dokumen.create');
Route::post('/store-Dokumen','DokumenController@store')->name('dokumen.store');
Route::get('/edit-Dokumen/{id_dokumen}/edit','DokumenController@edit')->name('dokumen.edit');
Route::put('/update-Dokumen/{id_dokumen}/update','DokumenController@update')->name('dokumen.update');
Route::get('/hapus-Dokumen/{id_dokumen}/delete','DokumenController@destroy')->name('dokumen.delete');
Route::get('/filter-dokumen','DokumenController@filter')->name('dokumen.filter');
Route::get('/filespk/{id_dokumen}/download','DokumenController@download')->name('dokumen.download');
Route::get('/filespk/{id_dokumen}','DokumenController@show')->name('dokumen.filespk');
//Route::get('filespk/download/{image_spk}','DokumenController@download')->name('dokumen.download');

Route::get('/pajak','PajakController@index')->name('pajak');
Route::get('/create-pajak','PajakController@create')->name('pajak.create');
Route::post('/store-pajak','PajakController@store')->name('pajak.store');
Route::get('/edit-pajak/{id_pajak}/edit','PajakController@edit')->name('pajak.edit');
Route::put('/update-pajak/{id_pajak}/update','PajakController@update')->name('pajak.update');
Route::get('/hapus-pajak/{id_pajak}/delete','PajakController@destroy')->name('pajak.delete');

Route::get('/cetak-dokumen','CetakDokumenController@index')->name('cetakDok');
Route::get('/cetak-dokumen/file/{namafile}','CetakDokumenController@downloadFile')->name('cetakDok.file');
Route::get('/cetak-dokumen/foto/{namafoto}','CetakDokumenController@downloadFoto')->name('cetakDok.foto');

Route::resource('akun', 'AkunController');


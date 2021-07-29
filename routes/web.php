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
    return view('login');
});

Auth::routes();
Route::get('/tester', 'HomeController@tester');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/jenis-belanja','JenisBelanjaController@index')->name('jBelanja');
Route::get('/create-JB','JenisBelanjaController@create')->name('jBelanja.create');
Route::post('/store-JB','JenisBelanjaController@store')->name('jBelanja.store');
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

//Route::get('/dokumen','DokumenController@index')->name('dokumen');
Route::get('/dokumen','DokumenController@getDokumen')->name('dokumen');
Route::get('/create-Dokumen','DokumenController@create')->name('dokumen.create');
Route::post('/store-Dokumen','DokumenController@store')->name('dokumen.store');
Route::get('/show-Dokumen/{id_dokumen}/tampil','DokumenController@show')->name('dokumen.show');
Route::get('/edit-Dokumen/{id_dokumen}/edit','DokumenController@edit')->name('dokumen.edit');
Route::put('/update-Dokumen/{id_dokumen}/update','DokumenController@update')->name('dokumen.update');
Route::get('/hapus-Dokumen/{id_dokumen}/delete','DokumenController@destroy')->name('dokumen.delete');
Route::get('/verifikasi-Dokumen/{id_dokumen}/verifikasi','DokumenController@verval')->name('dokumen.verifikasi');
Route::get('/show-Dokumen/{id_dokumen}/batalverif','DokumenController@noverval')->name('dokumen.noverifikasi');
//Route::get('/show-Dokumen/{id_dokumen}/batalvervalb','DokumenController@novervalbelanja')->name('dokumen.novervalbelanja');
Route::get('/filter-dokumen','DokumenController@filter')->name('dokumen.filter');
Route::get('/filespk/{id_dokumen}/download','DokumenController@download')->name('dokumen.download');
Route::get('/filespk/{id_dokumen}','DokumenController@show')->name('dokumen.filespk');
//Route::get('filespk/download/{image_spk}','DokumenController@download')->name('dokumen.download');

Route::get('/belanja','BelanjaController@index')->name('belanja');
Route::get('/create-Belanja','BelanjaController@create')->name('belanja.create');
Route::post('/store-Belanja','BelanjaController@store')->name('belanja.store');
Route::get('/show-Belanja/{id_belanja}/tampil','BelanjaController@show')->name('belanja.show');
Route::get('/edit-Belanja/{id_belanja}/edit','BelanjaController@edit')->name('belanja.edit');
Route::put('/update-Belanja/{id_belanja}/update','BelanjaController@update')->name('belanja.update');
Route::get('/hapus-belanja/{id_belanja}/delete','BelanjaController@destroy')->name('belanja.delete');
Route::get('/show-Belanja/{id_dokumen}/batalvervalb','BelanjaController@unvervalbelanja')->name('belanja.unvervalbelanja');
Route::get('/verifikasi-dok/{id_dokumen}/vervalb','BelanjaController@vervalbelanja')->name('belanja.vervalbelanja');

Route::get('/pajak','PajakController@index')->name('pajak');
Route::get('/create-pajak','PajakController@create')->name('pajak.create');
Route::post('/store-pajak','PajakController@store')->name('pajak.store');
Route::get('/edit-pajak/{id_pajak}/edit','PajakController@edit')->name('pajak.edit');
Route::put('/update-pajak/{id_pajak}/update','PajakController@update')->name('pajak.update');
Route::get('/hapus-pajak/{id_pajak}/delete','PajakController@destroy')->name('pajak.delete');

Route::get('/cetak-dokumen','CetakDokumenController@index')->name('cetakDok');

Route::get('/export','CetakDokumenController@export')->name('export');
Route::get('/cetak-dokumen/file/{namafile}','CetakDokumenController@downloadFile')->name('cetakDok.file');
Route::get('/cetak-dokumen/foto/{namafoto}','CetakDokumenController@downloadFoto')->name('cetakDok.foto');

Route::get('/cetak-laporan','LaporanController@index')->name('cetakLap');

//Route::resource('akun', 'AkunController');
Route::get('/user','AkunController@index')->name('user');
Route::get('/edit-user/{id}/edit','AkunController@edit')->name('user.edit');
Route::get('/create-user','AkunController@create')->name('user.create');
Route::put('/update-user/{id}/update','AkunController@update')->name('user.update');
Route::get('/hapus-user/{id}/delete','AkunController@destroy')->name('user.delete');
Route::get('/change-password/{id}/change','AkunController@change')->name('user.change');
Route::post('change-password-new', 'AkunController@changePassword')->name('change.password');




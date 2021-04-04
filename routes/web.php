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
Route::get('/dokumen','HomeController@dokumen')->name('dokumen');
Route::get('/jenis-belanja','JenisBelanjaController@index')->name('jBelanja');
Route::get('/create-JB','JenisBelanjaController@create')->name('jBelanja.create');
Route::post('/store-JB','JenisBelanjaController@store')->name('jBelanja.store');
Route::get('/create-JB/{id_jenis}/edit','JenisBelanjaController@edit')->name('jBelanja.edit');
Route::put('/update-JB/{id_jenis}/update','JenisBelanjaController@update')->name('jBelanja.update');
Route::get('/delete-JB/{id_jenis}/delete','JenisBelanjaController@destroy')->name('jBelanja.delete');


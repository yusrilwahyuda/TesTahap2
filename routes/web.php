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

Route::get('/', 'ProdukController@hal_awal');
Route::get('/create', 'ProdukController@create');
Route::post('/store', 'ProdukController@store')->name('store');
Route::get('/halproduk', 'ProdukController@index')->name('halproduk');
Route::post('/delete/{id}', 'ProdukController@destroy');
Route::get('/edit/{id}', 'ProdukController@edit')->name('edit');
Route::post('/update', 'ProdukController@update')->name('update');

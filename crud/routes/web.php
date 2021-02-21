<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutosController;

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


Route::get('/','App\Http\Controllers\ProdutosController@create');
Route::post('/','App\Http\Controllers\ProdutosController@store')->name('registrar_produto');
Route::post('/produtos/edit/{id}','App\Http\Controllers\ProdutosController@update')->name('update_produto');
Route::post('/produtos/delete/{id}','App\Http\Controllers\ProdutosController@destroy')->name('delete_produto');


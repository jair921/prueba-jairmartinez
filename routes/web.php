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

Route::get('/', 'HomeController@index')->name('index');
Route::get('/order', 'OrderController@index')->name('order.index');
Route::post('/order', 'OrderController@create')->name('order.create');
Route::get('/order/{id}', 'OrderController@show')->name('order.show');
Route::get('/order/{id}/retry', 'OrderController@retry')->name('order.retry');

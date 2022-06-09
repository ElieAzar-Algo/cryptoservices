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


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/', 'App\Http\Controllers\ServiceController@web_index');
Route::get('/home', 'App\Http\Controllers\ServiceController@web_index');
Route::get('/service', 'App\Http\Controllers\ServiceController@web_view')->name('service');
Route::get('/pleasesignin', 'App\Http\Controllers\ServiceController@web_pleasesignin')->name('pleasesignin');
Route::post('/pay', 'App\Http\Controllers\ServiceController@web_pay')->name('pay');
Route::get('/registerform', 'App\Http\Controllers\AuthController@showregister')->name('registerform');
Route::post('/register', 'App\Http\Controllers\AuthController@postregister')->name('postregister');
Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');


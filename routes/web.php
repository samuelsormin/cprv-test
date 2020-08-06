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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/report', 'ReportController@index')->name('report');
Route::post('/report', 'ReportController@store')->name('storeReport');
Route::get('/login', 'AuthController@login')->name('login');
Route::post('/login', 'AuthController@authenticate')->name('authenticate');
Route::post('/logout', 'AuthController@logout')->name('logout');

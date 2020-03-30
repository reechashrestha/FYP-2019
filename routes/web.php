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
Route::get('admin/services', 'HomeController@index')->name('services');
Route::get('admin/bookings', 'HomeController@index')->name('bookings');
Route::get('admin/payments', 'HomeController@index')->name('payments');
Route::get('admin/manage_user', 'HomeController@index')->name('manageuser');
Route::get('admin/categories', 'HomeController@index')->name('categories');

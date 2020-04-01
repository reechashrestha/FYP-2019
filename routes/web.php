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

//Route::get('/categories', 'CategoryController@index')->name('category');

Route::resource('categories', 'CategoryController');

//Route::resource('crud_admin/add_categories', 'CategoryController@create')->name('create');


//Route::get('admin/services', 'HomeController@index')->name('services');
//Route::get('admin/bookings', 'HomeController@index')->name('bookings');
//Route::get('admin/payments', 'HomeController@index')->name('payments');
//Route::get('admin/manage_user', 'HomeController@index')->name('manage_user');
//Route::get('admin/categories', 'HomeController@index')->name('categories');


//Route::resource('category','CategoryController');
//Route::resource('service','ServiceController');
//Route::resource('payment','PaymentController');
//Route::resource('category','CategoryController');


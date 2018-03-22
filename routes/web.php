<?php

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


Route::get('/', 'IndexController@index');
Route::post('/book', 'IndexController@createBooking');
Route::get('/admin', 'AdminController@index');
Route::post('/admin/delete-booking', 'AdminController@deleteBooking');
Route::get('/booking-data', 'BookingDataController@index');
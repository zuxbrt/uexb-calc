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

Route::get('/', 'Controller@index');

Route::post('/', 'Controller@store');

// disable registration
//Auth::routes();
Auth::routes(['register' => false]);

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/courses', 'CourseController@index');
Route::get('/coupons', 'CouponController@index');
Route::get('/customers', 'CustomerController@index');
Route::get('/administration', 'AdminController@index');
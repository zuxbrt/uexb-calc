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

Route::get('/', 'MainController@index');
Route::post('/', 'MainController@store');

// disable registration
//Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::resource('/courses', 'CourseController');
Route::resource('coupons', 'CouponController');
Route::resource('/customers', 'CustomerController');

Route::get('/pdf', 'PDFController@index');
Route::get('/view-pdf/{customer}', 'CustomerController@viewPDF');
Route::post('/pdf/save', 'PDFController@save');

Route::get('/administration', 'AdminController@index');

Auth::routes(['register' => false]);

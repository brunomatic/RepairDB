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

Route::get('/', 'Auth\LoginController@showLoginForm');

// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::group(['middleware' => 'auth'], function () {


    /**
     * Client routes
     */
    Route::get('clients', 'ClientController@index');
    Route::get('client/new', 'ClientController@showCreateForm');
    Route::post('client/store', 'ClientController@store');
    Route::get('client/show/{client}', 'ClientController@show');
    Route::get('client/edit/{client}', 'ClientController@showEditForm');
    Route::post('client/edit/{client}', 'ClientController@edit');


    /**
     * Device routes
     */
    Route::get('devices', 'DeviceController@index');
    Route::get('device/new', 'DeviceController@showCreateForm');
    Route::post('device/store', 'DeviceController@store');
    Route::get('device/show/{device}', 'DeviceController@show');
    Route::get('device/edit/{device}', 'DeviceController@showEditForm');
    Route::post('device/edit/{device}', 'DeviceController@edit');


    /**
     * Job routes
     */
    Route::get('job/{device}/new', 'JobController@showCreateForm');
    Route::post('job/{device}/store', 'JobController@store');
    Route::get('job/{job}/show', 'JobController@show');
    Route::get('job/{job}/edit', 'JobController@showEditForm');
    Route::post('job/{job}/edit', 'JobController@edit');
    Route::get('job/{job}/delete', 'JobController@delete');



});

Route::get('/home', 'HomeController@index');

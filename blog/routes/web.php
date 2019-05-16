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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function (){
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'UsersController@index');
        Route::post('/store', 'UsersController@store');
        Route::post('/update', 'UsersController@update');
        Route::post('/update/role', 'UsersController@updateRole');
        Route::post('/delete', 'UsersController@delete');
    });
});

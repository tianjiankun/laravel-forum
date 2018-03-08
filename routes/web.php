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

Route::group(['prefix' => 'admin', 'namespace' => 'admin'], function (){
    Route::group(['prefix' => 'admin'], function (){
        Route::get('/list', 'AdminUserController@index');
        Route::get('/add', 'AdminUserController@add');
        Route::post('/store', 'AdminUserController@store');
        Route::get('/edit/{id}', 'AdminUserController@edit');
        Route::post('/update/{id}', 'AdminUserController@update');
        Route::get('/delete/{id}', 'AdminUserController@delete');
    });
    Route::group(['prefix' => 'category'], function (){
        Route::get('/list', 'CategoryController@index');
        Route::get('/add', 'CategoryController@add');
        Route::post('/store', 'CategoryController@store');
        Route::get('/edit/{id}', 'CategoryController@edit');
        Route::post('/update/{id}', 'CategoryController@update');
        Route::get('/delete/{id}', 'CategoryController@delete');
    });
    Route::group(['prefix' => 'post'], function (){
        Route::get('/list', 'PostController@index');
        Route::get('/delete/{id}', 'PostController@delete');
    });
});
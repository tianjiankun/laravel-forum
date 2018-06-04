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
Auth::routes();
Route::group(['namespace'=>'Home'], function (){
    Route::get('/', 'IndexController@index');
    Route::get('/category/cid/{cid}', 'IndexController@category');
    Route::get('/post/show/{id}', 'PostController@show')->name('post.show');
    Route::post('/post/comment/{id}', 'PostController@comment')->name('post.comment');
    //需要登录才能访问的页面
    Route::group(['middleware'=>'auth'], function() {
        Route::get('/personal', 'PersonalController@personal')->name('personal');
        Route::get('/personal/release', 'PersonalController@release');
        Route::post('/personal/releaseHandle', 'PersonalController@releaseHandle')->name('personal.release.handle');
        Route::post('/personal/uploadImg', 'PersonalController@uploadImg');
    });
});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'admin.auth'], function (){
    Route::get('/', 'IndexController@index')->name('admin');
        Route::group(['prefix' => 'admin_user'], function (){
            Route::get('/list', 'AdminUserController@index')
                ->name('admin_user.list');
            Route::get('/add', 'AdminUserController@add')
                ->name('admin_user.add');
            Route::post('/store', 'AdminUserController@store')
                ->name('admin_user.store');
            Route::get('/edit/{id}', 'AdminUserController@edit')
                ->name('admin_user.edit');
            Route::post('/update/{id}', 'AdminUserController@update')
                ->name('admin_user.update');
            Route::get('/delete/{id}', 'AdminUserController@delete')
                ->name('admin_user.delete');
            Route::get('/restore/{id}', 'AdminUserController@restore')
                ->name('admin_user.restore');
            Route::get('/force_delete/{id}', 'AdminUserController@forceDelete')
                ->name('admin_user.force_delete');
        });
        Route::group(['prefix' => 'category'], function (){
            Route::get('/list', 'CategoryController@index');
            Route::get('/add', 'CategoryController@add');
            Route::post('/store', 'CategoryController@store');
            Route::get('/edit/{id}', 'CategoryController@edit');
            Route::post('/update/{id}', 'CategoryController@update');
            Route::get('/delete/{id}', 'CategoryController@delete');
            Route::get('/restore/{id}', 'CategoryController@restore');
            Route::get('/force_delete/{id}', 'CategoryController@forceDelete');
            Route::post('/sort', 'CategoryController@sort');
        });
        Route::group(['prefix' => 'post'], function (){
            Route::get('/list', 'PostController@index');
            Route::get('/top/{id}', 'PostController@top');
            Route::get('/essence/{id}', 'PostController@essence');
            Route::get('/delete/{id}', 'PostController@delete');
        });
});


Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function (){
    Route::get('/login', 'LoginController@index');
});
Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function () {
    // 后台登录
    Route::group(['prefix' => 'admin'], function () {
        Route::post('login', 'AdminController@login');
    });
    // 前台用户登录
    Route::post('login', 'LoginController@login');
});
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
//
//Route::get('logout', function() {
//    Auth::logout();
//    return redirect('/');
//});
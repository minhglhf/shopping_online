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

//Route::get('/', function () {
//    return view('home');
//});

Route::get('/home_page', function () {
    return view('home_page');
})->name('home_page');

Route::prefix('admin')->group(function () {
    Route::prefix('categories')->group(function () {
        Route::get('/', [
            'as' => 'categories.index',
            'uses' => 'CategoryController@index',
        ]);
        Route::get('/create', [
            'as' => 'categories.create',
            'uses' => 'CategoryController@create',
        ]);
        Route::post('/store', [
            'as' => 'categories.store',
            'uses' => 'CategoryController@store',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'categories.edit',
            'uses' => 'CategoryController@edit',
        ]);
        Route::post('/update/{id}', [
            'as' => 'categories.update',
            'uses' => 'CategoryController@update',
        ]);
        Route::get('/delete/{id}', [
            'as' => 'categories.delete',
            'uses' => 'CategoryController@delete',
        ]);
    });

    Route::prefix('menus')->group(function () {
        Route::get('/', [
            'as' => 'menus.index',
            'uses' => 'MenuController@index',
        ]);
        Route::get('/create', [
            'as' => 'menus.create',
            'uses' => 'MenuController@create',
        ]);
        Route::post('/store', [
            'as' => 'menus.store',
            'uses' => 'MenuController@store',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'menus.edit',
            'uses' => 'MenuController@edit',
        ]);
        Route::post('/update/{id}', [
            'as' => 'menus.update',
            'uses' => 'MenuController@update',
        ]);
        Route::get('/delete/{id}', [
            'as' => 'menus.delete',
            'uses' => 'MenuController@delete',
        ]);
        Route::get('/restore', [
            'as' => 'menus.restore',
            'uses' => 'MenuController@restore',
        ]);
        Route::get('/setPass', [
            'as' => 'menus.setPass',
            'uses' => 'MenuController@setPass',
        ]);
    });

    Route::prefix('product')->group(function () {
        Route::get('/', [
            'as' => 'product.index',
            'uses' => 'ProductController@index',
        ]);
        Route::get('/create', [
            'as' => 'product.create',
            'uses' => 'ProductController@create',
        ]);
        Route::post('/store', [
            'as' => 'product.store',
            'uses' => 'ProductController@store',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'product.edit',
            'uses' => 'ProductController@edit',
        ]);
        Route::post('/update/{id}', [
            'as' => 'product.update',
            'uses' => 'ProductController@update',
        ]);
        Route::get('/delete/{id}', [
            'as' => 'product.delete',
            'uses' => 'ProductController@delete',
        ]);

    });

    Route::prefix('slider')->group(function () {
        Route::get('/', [
            'as' => 'slider.index',
            'uses' => 'SliderController@index',
        ]);
        Route::get('/create', [
            'as' => 'slider.create',
            'uses' => 'SliderController@create',
        ]);
        Route::post('/store', [
            'as' => 'slider.store',
            'uses' => 'SliderController@store',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'slider.edit',
            'uses' => 'SliderController@edit',
        ]);
        Route::post('/update/{id}', [
            'as' => 'slider.update',
            'uses' => 'SliderController@update',
        ]);
        Route::get('/delete/{id}', [
            'as' => 'slider.delete',
            'uses' => 'SliderController@delete',
        ]);
    });

    Route::prefix('settings')->group(function () {
        Route::get('/', [
            'as' => 'settings.index',
            'uses' => 'SettingController@index',
        ]);
        Route::get('/create', [
            'as' => 'settings.create',
            'uses' => 'SettingController@create',
        ]);
        Route::post('/store', [
            'as' => 'settings.store',
            'uses' => 'SettingController@store',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'settings.edit',
            'uses' => 'SettingController@edit',
        ]);
        Route::post('/update/{id}', [
            'as' => 'settings.update',
            'uses' => 'SettingController@update',
        ]);
        Route::get('/delete/{id}', [
            'as' => 'settings.delete',
            'uses' => 'SettingController@delete',
        ]);
    });

    Route::prefix('users')->group(function () {
        Route::get('/', [
            'as' => 'users.index',
            'uses' => 'UserController@index',
        ]);
        Route::get('/create', [
            'as' => 'users.create',
            'uses' => 'UserController@create',
        ]);
        Route::post('/store', [
            'as' => 'users.store',
            'uses' => 'UserController@store',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'users.edit',
            'uses' => 'UserController@edit',
        ]);
        Route::post('/update/{id}', [
            'as' => 'users.update',
            'uses' => 'UserController@update',
        ]);
        Route::get('/delete/{id}', [
            'as' => 'users.delete',
            'uses' => 'UserController@delete',
        ]);
    });

    Route::prefix('roles')->group(function () {
        Route::get('/', [
            'as' => 'roles.index',
            'uses' => 'RoleController@index',
        ]);
        Route::get('/create', [
            'as' => 'roles.create',
            'uses' => 'RoleController@create',
        ]);
        Route::post('/store', [
            'as' => 'roles.store',
            'uses' => 'RoleController@store',
        ]);
        Route::get('/edit/{id}', [
            'as' => 'roles.edit',
            'uses' => 'RoleController@edit',
        ]);
        Route::post('/update/{id}', [
            'as' => 'roles.update',
            'uses' => 'RoleController@update',
        ]);
        Route::get('/delete/{id}', [
            'as' => 'roles.delete',
            'uses' => 'RoleController@delete',
        ]);
    });

});


Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('auth/login');
})->middleware('guest');

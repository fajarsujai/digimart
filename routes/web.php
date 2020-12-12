<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'HomeController@index')
    ->name('home');

Route::get('/detail-toko/{slug}', 'ClientDetailController@outletDetail');
Route::get('/tentang-kami', 'HomeController@about')->name('tentang-kami');
Route::get('/pdfview/{id}','ClientDetailController@pdfView');


Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', 'Admin\DashboardController@index')->name('dashboard');
    Route::resource('user', 'UserController', ['except' => ['show']]);
    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
    Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
    Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);

    // outlet
    Route::get('pages/admin/outlet/index', 'OutletController@index')->name('outlet.index');
    Route::get('pages/admin/outlet/create', 'OutletController@create')->name('outlet.create');
    Route::post('pages/admin/outlet/store', 'OutletController@store')->name('outlet.store');
    Route::get('pages/admin/outlet/edit/{slug}', 'OutletController@edit')->name('outlet.edit');
    Route::patch('pages/admin/outlet/update/{slug}', 'OutletController@update')->name('outlet.update');

    // product
    Route::get('pages/admin/product/index', 'ProductController@index')->name('product.index');
    Route::get('pages/admin/product/create', 'ProductController@create')->name('product.create');
    Route::post('pages/admin/product/store', 'ProductController@store')->name('product.store');
    Route::get('pages/admin/product/edit/{id}', 'ProductController@edit')->name('product.edit');
    Route::patch('pages/admin/product/update/{id}', 'ProductController@update')->name('product.update');

    // Category
    Route::get('pages/admin/category/index', 'CategoryController@index')->name('category.index');
    Route::get('pages/admin/category/create', 'CategoryController@create')->name('category.create');
    Route::post('pages/admin/category/store', 'CategoryController@store')->name('category.store');
});

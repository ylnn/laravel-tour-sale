<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () { /* Middleware: admin eklenecek */

    Route::get('index', 'AdminController@index')->name('admin.dashboard');

    Route::group(['prefix' => 'category'], function(){
        Route::get('index', 'CategoryController@index')->name('admin.category.index');
        Route::get('create', 'CategoryController@create')->name('admin.category.create');
        Route::post('store', 'CategoryController@store')->name('admin.category.store');
        Route::get('show/{category}', 'CategoryController@show')->name('admin.category.show');
        Route::get('edit/{category}', 'CategoryController@edit')->name('admin.category.edit');
        Route::post('update/{category}', 'CategoryController@update')->name('admin.category.update');
    });

});

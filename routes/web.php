<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () { /* Middleware: admin eklenecek */

    Route::get('index', 'AdminController@index')->name('admin.dashboard');

    Route::group(['prefix' => 'category'], function(){
        Route::get('index', 'CategoryController@index')->name('admin.category.index');
        Route::get('create', 'CategoryController@create')->name('admin.category.create');
        Route::get('edit/{category}', 'CategoryController@edit')->name('admin.category.edit');
    });

});

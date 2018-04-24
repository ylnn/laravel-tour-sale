<?php


/* Front Side */
Route::group(['namespace' => 'Front'], function (){
    Route::get('/', 'FrontController@home')->name('home');
    Route::get('category/{category}', 'CategoryController@show')->name('category');
    Route::get('tour_detail/{tour}', 'TourController@show')->name('tour');
    
    Route::get('reservation_step1/{date}', 'TourController@reservationStep1')->name('reservation.show');
    Route::get('reservation_step2/{date}/{adult}', 'TourController@reservationStep2')->name('reservation.step2.show');

    Route::post('res_post', 'TourController@post');
});

/* Login - Register */
Route::get('loginform', function () {})->name('auth.loginform');
Route::get('register', function () {})->name('auth.register');

/* Admin Side */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () { /* Middleware: admin eklenecek */

    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    Route::group(['prefix' => 'category'], function(){
        Route::get('index', 'CategoryController@index')->name('admin.category.index');
        Route::get('create', 'CategoryController@create')->name('admin.category.create');
        Route::post('store', 'CategoryController@store')->name('admin.category.store');
        Route::get('show/{category}', 'CategoryController@show')->name('admin.category.show');
        Route::get('edit/{category}', 'CategoryController@edit')->name('admin.category.edit');
        Route::post('update/{category}', 'CategoryController@update')->name('admin.category.update');
        Route::get('delete/{category}', 'CategoryController@destroy')->name('admin.category.delete');
    });
    
    Route::group(['prefix' => 'tour'], function(){
        Route::get('index', 'TourController@index')->name('admin.tour.index');
        Route::get('create', 'TourController@create')->name('admin.tour.create');
        Route::post('store', 'TourController@store')->name('admin.tour.store');
        Route::get('show/{tour}', 'TourController@show')->name('admin.tour.show');
        Route::get('edit/{tour}', 'TourController@edit')->name('admin.tour.edit');
        Route::post('update/{tour}', 'TourController@update')->name('admin.tour.update');
        Route::get('delete/{tour}', 'TourController@destroy')->name('admin.tour.delete');
    });

    Route::group(['prefix' => 'date'], function(){
        Route::get('index/{tour}', 'DateController@index')->name('admin.date.index');
        Route::get('create/{tour}', 'DateController@create')->name('admin.date.create');
        Route::post('store/{tour}', 'DateController@store')->name('admin.date.store');
        Route::get('show/{date}', 'DateController@show')->name('admin.date.show');
        Route::get('edit/{date}', 'DateController@edit')->name('admin.date.edit');
        Route::post('update/{date}', 'DateController@update')->name('admin.date.update');
        Route::get('delete/{date}', 'DateController@destroy')->name('admin.date.delete');
    });
    
    Route::get('get_photos_ajax/{tour}', 'TourController@getPhotos')->name('getPhotosAjax');
    Route::post('upload_photo_ajax', 'TourController@storePhoto')->name('uploadPhoto');
    Route::post('delete_photo_ajax', 'TourController@deletePhoto')->name('deletePhoto');
    
    Route::get('get_vue_lang', 'TourController@getLangForVue');

});

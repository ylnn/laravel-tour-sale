<?php


/* Front Side */
Route::group(['namespace' => 'Front'], function (){
    Route::get('/', 'FrontController@home')->name('home');
    Route::get('category/{category}', 'CategoryController@show')->name('category');
    Route::get('tour_detail/{tour}', 'TourController@show')->name('tour');
    
    Route::get('reservation1/{date}', 'ReservationController@select')->name('reservation.selectpax');
    Route::get('reservation2/{date}/{adult}', 'ReservationController@contact')->name('reservation.contact');

    Route::post('reservation_post', 'ReservationController@post');
    
    Route::get('payment/{reservation}', 'PaymentController@show')->name('payment.show');
    Route::post('make_payment/{reservation}', 'PaymentController@makePayment')->name('payment.make');
});

/* Login */
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('do_login', 'Auth\LoginController@login')->name('loginpost');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');
// Route::get('register', function () {})->name('auth.register');

/* Admin Side */
Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => 'auth'], function () { 

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

    Route::group(['prefix' => 'payment'], function () {
        Route::get('index', 'PaymentController@index')->name('admin.payment.index');
        Route::get('show/{payment}', 'PaymentController@show')->name('admin.payment.show');
        Route::get('delete/{payment}', 'PaymentController@destroy')->name('admin.payment.delete');
    });

    Route::group(['prefix' => 'reservation'], function () {
        Route::get('index', 'ReservationController@index')->name('admin.reservation.index');
        Route::get('show/{reservation}', 'ReservationController@show')->name('admin.reservation.show');
        Route::get('delete/{reservation}', 'ReservationController@destroy')->name('admin.reservation.delete');
    });
    
    Route::get('get_photos_ajax/{tour}', 'TourController@getPhotos')->name('getPhotosAjax');
    Route::post('upload_photo_ajax', 'TourController@storePhoto')->name('uploadPhoto');
    Route::post('delete_photo_ajax', 'TourController@deletePhoto')->name('deletePhoto');
    
    Route::get('get_vue_lang', 'TourController@getLangForVue');

});

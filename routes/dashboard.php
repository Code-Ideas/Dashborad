<?php

use Illuminate\Support\Facades\Route;

/* Dashboard Routes */
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['admin']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::group(['namespace' => 'Admin', 'prefix' => 'dashboard', 'as' => 'admin.', 'middleware' => ['admin']], function () {
    Route::name('dashboard')->get('/', 'HomeController@index');
    // Sections
    Route::resource('sections', 'SectionsController', ['except' => 'show']);
    // Articles
    Route::resource('articles', 'ArticlesController');
    Route::post('articles/{article}/photos', 'ImagesController@store')->name('store_photo');
    Route::delete('photos/{photo}', 'ImagesController@destroy')->name('destroy_photo');
    // Sliders
    Route::resource('sliders', 'SlidersController', ['except' => 'show']);
    // Contacts
    Route::resource('contacts', 'ContactsController', ['only' => ['index', 'show', 'destroy']]);
    /* ====== About =======*/
    Route::name('abouts.edit')->get('abouts/edit', 'AboutsController@edit');
    Route::name('abouts.update')->patch('abouts/edit', 'AboutsController@update');
    /* ====== Settings =======*/
    Route::name('settings.edit')->get('settings/edit', 'SettingsController@edit');
    Route::name('settings.update')->patch('settings/edit', 'SettingsController@update');

    /* ====== Compoenets =======*/
    Route::get('compnents/modal', function () {
        return view('admin/components/modal');
    })->name('modal_component');
    Route::get('compnents/dropzone', function () {
        return view('admin/components/dropzone');
    })->name('dropzone_component');
    Route::get('compnents/uploader', function () {
        return view('admin/components/uploader');
    })->name('uploader_component');
    Route::get('compnents/iconpicker', function () {
        return view('admin/components/iconpicker');
    })->name('iconpicker_component');
    Route::get('compnents/colorpicker', function () {
        return view('admin/components/colorpicker');
    })->name('colorpicker_component');
    Route::get('compnents/maps', function () {
        return view('admin/components/maps');
    })->name('maps_component');
    Route::get('compnents/tags', function () {
        return view('admin/components/tags');
    })->name('tags_component');
    Route::get('compnents/datepicker', function () {
        return view('admin/components/datepicker');
    })->name('datepicker_component');

});

Route::group(['namespace' => 'Admin'], function () {
    Route::get('dashboard_login', 'AuthController@loginForm')->name('login_form');
    Route::post('dashboard_logged', 'AuthController@login')->name('admin_logged');
    Route::post('dashboard_logout', 'AuthController@logout')->name('admin_logout');
});

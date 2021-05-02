<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/* ====== Sign =======*/
Route::post('login', 'AuthController@login')->name('login');
Route::post('register', 'AuthController@register')->name('register');
/*====== Sliders =======*/
Route::get('sliders', 'SliderController');
/*====== Sections =======*/
Route::get('sections', 'SectionController')->name('sections.index');
/* ====== Articles =======*/
Route::apiResource('articles', 'ArticlesController', ['only' => ['index', 'show']]);
/*====== Contact =======*/
Route::post('contact', 'ContactController');

Route::middleware('auth:sanctum')->group(function () {
    // Logout
    Route::post('logout', 'AuthController@logout');
});

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

/*====== Sliders =======*/
Route::get('sliders', 'SliderController');
/*====== Sections =======*/
Route::get('sections', 'SectionController')->name('sections.index');
/* ====== Articles =======*/
Route::apiResource('articles', 'ArticlesController', ['only' => ['index', 'show']]);
/*====== Contact =======*/
Route::post('contact', 'ContactController');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

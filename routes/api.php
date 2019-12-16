<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function () {
    Route::resource('/artikel', 'ArticleController');
    Route::resource('/user', 'UserController');
    Route::get('/file', 'TestController@file_index')->name('file.index');
    Route::post('/file', 'TestController@file_upload')->name('file.upload');
    Route::delete('/file/{id}', 'TestController@file_destroy')->name('file.destroy');
    Route::post('/file/destroy', 'TestController@file_delete')->name('file.delete');
    Route::get('/reviews', 'ReviewController@index')->name('review.index');
    Route::post('/reviews', 'ReviewController@store')->name('review');
});

Route::resource('v2/file', 'DocumentController', [
    'as' => 'v2'
]);

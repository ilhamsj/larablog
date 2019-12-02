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

Route::resource('v1/artikel', 'ArticleController');

Route::get('v1/file', 'TestController@file_index')->name('file.index');
Route::post('v1/file', 'TestController@file_upload')->name('file.upload');
Route::delete('v1/file/{id}', 'TestController@file_destroy')->name('file.destroy');
Route::post('v1/file/destroy', 'TestController@file_delete')->name('file.delete');

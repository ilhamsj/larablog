<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// user - artikel
Route::get('/', 'PageController@welcome')->name('welcome');

// user - artikel
Route::group(['prefix' => 'artikel'], function () {
  Route::get('/', 'PageController@artikel_index')->name('user.artikel.index');
  Route::get('/{id}', 'PageController@artikel_show')->name('user.artikel.show');
});

// admin
Route::group(['prefix' => 'admin'], function () {
  Route::get('', 'AdminController@dashboard')->name('admin.dashboard');
  Route::get('artikel', 'AdminController@artikel')->name('admin.artikel');
  Route::get('foto', 'AdminController@foto')->name('admin.foto');
  Route::get('dokumen', 'AdminController@document')->name('admin.document');
  Route::get('galeri', 'AdminController@gallery')->name('admin.gallery');
  Route::get('review', 'AdminController@reviews')->name('admin.review');
});
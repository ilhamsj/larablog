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

Auth::routes();
Route::get('/', 'PageController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function () {
  Route::get('', 'AdminController@dashboard')->name('admin.dashboard');
  Route::get('artikel', 'AdminController@articles')->name('admin.artikel');
  Route::get('foto', 'AdminController@files')->name('admin.foto');
  Route::get('dokumen', 'AdminController@documents')->name('admin.document');
  Route::get('galeri', 'AdminController@galleries')->name('admin.gallery');
  Route::get('review', 'AdminController@reviews')->name('admin.review');
  Route::get('user', 'AdminController@users')->name('admin.user');
});

Route::group(['prefix' => 'artikel'], function () {
  Route::get('/', 'PageController@artikel_index')->name('user.artikel.index');
  Route::get('/{id}', 'PageController@artikel_show')->name('user.artikel.show');
});

Route::group(['prefix' => 'pengumuman'], function () {
  Route::get('/', 'PageController@artikel_pengumuman')->name('user.pengumuman.index');
  Route::get('/{id}', 'PageController@artikel_show')->name('user.pengumuman.show');
});

Route::get('/dokumen', 'PageController@dokumen_index')->name('user.dokumen.index');
Route::get('/kegiatan', 'PageController@dokumen_kegiatan')->name('user.kegiatan.index');

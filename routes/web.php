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

Route::get('/', 'PageController@welcome')->name('welcome');
Route::get('/artikel', 'PageController@artikel_index')->name('user.artikel.index');
Route::get('/artikel/{id}', 'PageController@artikel_show')->name('user.artikel.show');

Route::get('/kontak', 'PageController@kontak')->name('user.kontak.index');

Route::get('/admin', 'AdminController@dashboard')->name('admin.dashboard');
Route::get('/admin/artikel', 'AdminController@artikel')->name('admin.artikel');
Route::get('/admin/artikel/create', 'ArticleController@create')->name('admin.artikel.create');

Route::get('/admin/foto', 'AdminController@foto')->name('admin.foto');
Route::get('/admin/document', 'AdminController@document')->name('admin.document');
Route::get('/admin/gallery', 'AdminController@gallery')->name('admin.gallery');

Route::get('/admin/reviews', 'AdminController@reviews')->name('admin.review');

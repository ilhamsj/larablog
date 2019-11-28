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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/berita', function () {
    return view('show');
});

Route::get('/admin', 'AdminController@dashboard')->name('admin.dashboard');
Route::resource('/admin/artikel', 'ArticleController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

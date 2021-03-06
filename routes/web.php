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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/contact', function () {
  return view('contact');
});

Auth::routes();

Route::get('file', 'FileController@showUploadForm')->name('upload.file');
Route::post('file', 'FileController@storeFile');

Route::get('/', 'BreadController@index');
Route::resource('/bread', 'BreadController');

Route::get('/', 'BestellingController@index');
Route::resource('/bestelling', 'BestellingController');

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/user', 'HomeController');

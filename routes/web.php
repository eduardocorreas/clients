<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/client/{id}', 'ClientDetailController@index')->name('detailClient');
Route::post('/uploadDocument', 'ClientDetailController@store')->name('uploadDocument');
Route::get('/documents/download/documents/{document}', 'ClientDetailController@downloadFile')->name('downloadFile');
Route::delete('/documents/delete/{id}', 'ClientDetailController@destroy')->name('deleteFile');

Route::post('/uploadFileClient', 'HomeController@uploadFileClient')->name('uploadFileClient');
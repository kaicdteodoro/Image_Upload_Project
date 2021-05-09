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
Route::get('/',function (){
    return redirect()->route('home');
});

Route::get('home','PostController@index')->name('home');

Route::post('/','PostController@store')->name('store');
Route::delete('/{id}','PostController@destroy')->name('delete');
Route::get('/{id}','PostController@download')->name('download');
Auth::routes();


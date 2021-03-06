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
// break into different controllers
Route::post ( '/addBook', 'BookController@create' );
Route::post ( '/deleteBook/{id}', 'BookController@destroy' );
Route::get ( '/index', 'BookController@index' );

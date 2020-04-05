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


Route::resource('products', 'ProductController');

Route::get('product-list', 'YajraController@index');
Route::get('product-list-ajax', 'YajraController@usersList');
 Route::get('product-list/{id}/edit', 'YajraController@edit');
 Route::post('product-list/store', 'YajraController@store');
 Route::get('product-list/delete/{id}', 'YajraController@destroy');

 Route::get('users', 'UsersController@index');

Route::get('users-list', 'UsersController@usersList'); 
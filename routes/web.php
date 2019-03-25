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

Route::resource('products','ProductsController');
// Route::get('/products', 'ProductsController@index');
// Route::get('products/add','ProductsController@create');
// Route::post('products','ProductsController@store');
// Route::get('/products/{product}/edit','ProductsController@edit');
// Route::PUT('/products/{product}','ProductsController@update');
// Route::delete('products/{product}','ProductsController@delete');

Route::resource('users','UsersController');
// Route::get('/users','UsersController@index');
// Route::get('users/add','UsersController@create');
// Route::post('users','UsersController@store');
// Route::get('/users/{user}/edit','UsersController@edit');
// Route::PUT('users/{user}','UsersController@update');
// Route::delete('users/{user}','UsersController@delete');
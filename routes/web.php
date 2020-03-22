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

//  Route::get('/', function () {
//       return view('products.index');
//  });
use App\Http\Controllers\ProductsController;

Route::get('/','ProductsController@index');
 
Route::resource('products','ProductsController');
// Route::get('/products', 'ProductsController@index');
// Route::get('products/add','ProductsController@create');
// Route::post('products','ProductsController@store');
// Route::get('/products/{product}/edit','ProductsController@edit');
// Route::PUT('/products/{product}','ProductsController@update');
// Route::delete('products/{product}','ProductsController@delete');

Route::resource('users','UsersController')->middleware('auth');
// Route::get('/users','UsersController@index');
// Route::get('users/add','UsersController@create');
// Route::post('users','UsersController@store');
// Route::get('/users/{user}/edit','UsersController@edit');
// Route::PUT('users/{user}','UsersController@update');
// Route::delete('users/{user}','UsersController@delete');
Route::resource('categories','CategoriesController')->middleware('auth');

Route::resource('brands','BrandsController')->middleware('auth');

Route::get('/profile','UserAccountController@profile')->middleware('auth');
Route::get('/profile/edit','UserAccountController@edit')->middleware('auth');
Route::PUT('profile/update','UserAccountController@update')->middleware('auth');

Route::get('orders','OrderController@index')->middleware('auth');
Route::get('/products/{product}/order','OrderController@order')->middleware('auth')->name('product.order');
Route::PUT('/products/{product}/ordered','OrderController@store')->middleware('auth');
Route::delete('orders/{order}','OrderController@delete')->middleware('auth');
Route::get('myOrders','OrderController@myOrders')->middleware('auth');
Route::get('order/views','OrderController@viewOrder')->middleware('auth');

Route::PUT('comments/{product_id}','CommentController@storeComment')->middleware('auth');
Route::delete('comments/{comment}','CommentController@delete')->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

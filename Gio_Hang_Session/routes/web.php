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
Route::get('products/{id}', 'ProductController@show')->name('show');
Route::get('Buying/{id}', 'ProductController@showBuy')->name('showBuy');

Route::get('products', 'ProductController@welcome')->name('index');
Route::get('products/{id}', 'ProductController@show')->name('show');
Route::group(['prefix' => 'product'], function () {
  Route::get('/','ProductController@index')->name('product.index');
  Route::get('/create','ProductController@create')->name('product.create');
  Route::post('/create','ProductController@store')->name('product.store');
  Route::get('/edit/{id}','ProductController@edit')->name('product.edit');
  Route::post('/edit/{id}','ProductController@update')->name('product.update');
  Route::get('/destroy/{id}','ProductController@destroy')->name('product.destroy');
  // Route::get('/filter','ProductController@filterByCity')->name('product.filterByCity');
  // Route::get('/search','ProductController@search')->name('product.search');
});
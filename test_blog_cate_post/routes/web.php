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
Route::group(['prefix' => 'categories'], function () {
  Route::get('/','CategoryController@index')->name('categories.index');
  Route::get('/create','CategoryController@create')->name('categories.create');
  Route::post('/create','CategoryController@store')->name('categories.store');
  Route::get('/edit/{id}','CategoryController@edit')->name('categories.edit');
  Route::post('/edit/{id}','CategoryController@update')->name('categories.update');
  Route::get('/destroy/{id}','CategoryController@destroy')->name('categories.destroy');
  // Route::get('/filter','CustomerController@filterByCity')->name('customers.filterByCity');
  // Route::get('/search','CustomerController@search')->name('customers.search');
});
Route::group(['prefix' => 'posts'], function () {
  Route::get('/','PostController@index')->name('posts.index');
  Route::get('/create','PostController@create')->name('posts.create');
  Route::post('/create','PostController@store')->name('posts.store');
  Route::get('/edit/{id}','PostController@edit')->name('posts.edit');
  Route::post('/edit/{id}','PostController@update')->name('posts.update');
  Route::get('/destroy/{id}','PostController@destroy')->name('posts.destroy');
  Route::get('/filter','PostController@fillerByCategory')->name('posts.fillerByCategory');
  Route::get('/search','PostController@search')->name('posts.search');
});
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
    return view('home');
});
Route::group(['prefix' => 'customers'], function () {
  Route::get('/','CustomerController@index')->name('customers.index');
  Route::get('/create','CustomerController@create')->name('customers.create');
  Route::post('/create','CustomerController@store')->name('customers.store');
  Route::get('/edit/{id}','CustomerController@edit')->name('customers.edit');
  Route::post('/edit/{id}','CustomerController@update')->name('customers.update');
  Route::get('/destroy/{id}','CustomerController@destroy')->name('customers.destroy');
});

Route::get('/', function () {
    return view('home');
});
Route::group(['prefix' => 'tasks'], function () {
  Route::get('/','TaskController@index')->name('tasks.index');
  Route::get('/create','TaskController@create')->name('tasks.create');
  Route::post('/create','TaskController@store')->name('tasks.store');
  Route::get('/edit/{id}','TaskController@edit')->name('tasks.edit');
  Route::post('/edit/{id}','TaskController@update')->name('tasks.update');
  Route::get('/destroy/{id}','TaskController@destroy')->name('tasks.destroy');
});
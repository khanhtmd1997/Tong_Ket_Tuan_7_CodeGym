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
// Route::get('posts/create', 'PostController@create');
// Route::post('posts', 'PostController@store');
// Route::post('comment/{comment}');
Route::group(['prefix' => 'validates'], function () {
Route::get('/create', 'Validate_NumbericController@create')->name('validates.create');;
Route::post('/store', 'Validate_NumbericController@store')->name('validates.store');
});

Route::group(['prefix' => 'customer-validations'], function () {

Route::get('/form', 'FormControllerController@checkValidation')->name('customer-validations.submit');
});
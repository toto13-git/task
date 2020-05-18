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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;


Route::get('/', function () {
  return view('welcome');
});

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
  // Route::get('index/{id}', 'UserController@index')->name('user.index');
  Route::get('show/{id}', 'UserController@show')->name('user.show');

  // Route::get('show/{id}', 'UserController@show')->name('user.show');
});

Route::group(['prefix' => 'item', 'middleware' => 'auth'], function () {
  Route::get('show/{id}', 'ItemController@show')->name('item.show');
  Route::get('create', 'ItemController@create')->name('item.create');
  Route::post('store', 'ItemController@store')->name('item.store');
  Route::get('edit/{id}', 'ItemController@edit')->name('item.edit');
  Route::post('update/{id}', 'ItemController@update')->name('item.update');
  Route::post('destroy/{id}', 'ItemController@destroy')->name('item.destroy');
  Route::post('del', 'ItemController@del')->name('item.del');
});






Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

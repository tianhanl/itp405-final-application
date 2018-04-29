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
Route::get('/signup', 'SignupController@index');
Route::post('/signup', 'SignupController@signup');
Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@logout');


Route::middleware(['protected'])->group(function () {
    Route::get('/profile', 'AdminController@index');
    Route::get('/phpinfo', function () {
        echo phpinfo();
    });
    Route::get('/items/new', 'ItemsController@create');
    Route::get('/items/{id}/edit', 'ItemsController@edit');
    Route::get('/items/{id}/delete', 'ItemsController@destroy');
    Route::get('/items/{id}', 'ItemsController@show');
    Route::post('/items/{id}', 'ItemsController@update');
    Route::get('/items', 'ItemsController@index');
    Route::post('/items', 'ItemsController@store');
    Route::get('/transactions/{id}/edit', 'TransactionController@edit');
    Route::get('/transactions/{id}/delete', 'TransactionController@destroy');
    Route::get('/transactions', 'TransactionController@index');
    Route::get('/transactions', 'TransactionController@index');
    Route::post('/transactions', 'TransactionController@create');
    Route::get('/profile', 'AdminController@index');
});

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

Auth::routes();

// Houses Route
Route::get('/', 'HouseController@index')->name('home');
Route::get('/houses/create', 'HouseController@create');
Route::post('/houses', 'HouseController@store');
Route::get('/houses/{house}', 'HouseController@show');
Route::get('/houses/{house}/edit', 'HouseController@edit');

// Review Route
Route::post('/houses/{house}/reviews', 'ReviewController@store');
// Message Route
Route::post('/houses/{house}/message', 'MessageController@store');


Route::get('/houses/backend/admin/guest/{user}', 'GuestController@index');


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

Route::get('gallery', function() {
    return view('homes.gallery');
});


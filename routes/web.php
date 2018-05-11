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
Route::resource('houses', 'HouseController')->except('index');
Route::get('/', 'HouseController@index')->name('home');

Route::get('/houses/regions/{region}', 'HouseController@region');
Route::get('/houses/townships/{township}', 'HouseController@township');

//Gallery Route
Route::get('/gallery', 'GalleryController@index');
Route::get('/gallery/data/{number}', 'GalleryController@loadData');

// Review Route
Route::post('/houses/{house}/reviews', 'ReviewController@store');
// Message Route
Route::post('/houses/{house}/message', 'MessageController@store');

// Favourite Route
Route::get('/favourite/{house}', 'FavouriteController@store')->name('favourite.store');
Route::get('/favourite', 'FavouriteController@show')->name('favourite.show');
Route::delete('/favourite/{house}', 'FavouriteController@delete')->name('favourite.delete');

// About for App
Route::get('/about', function() {
    return view('homes.about');
});

// Property route (test)
Route::get('/property', 'PropertyController@grid');
Route::get('/property/list', 'PropertyController@list');

// Search Route
Route::post('/search', 'SearchController@search');


Route::resource('admin', 'AdminController');

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

//Gallery Route
Route::get('/gallery', 'GalleryController@index');
Route::get('/gallery/data/{number}', 'GalleryController@loadData');

// Review Route
Route::post('/houses/{house}/reviews', 'ReviewController@store');
// Message Route
Route::post('/houses/{house}/message', 'MessageController@store');
// About for App
Route::get('/about', function() {
    return view('homes.about');
});

// Property route (test)
Route::get('/property', function() {
    return view('homes.property.property-grid');
});

Route::get('/property/list', function() {
    return view('homes.property.property-list');
});


Route::get('/houses/backend/admin/guest/{user}', 'GuestController@index');


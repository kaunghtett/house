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
Route::resource('houses', 'HouseController')->except('index');
Route::get('/houses/regions/{region}', 'HouseController@region');
Route::get('/houses/townships/{township}', 'HouseController@township');

// Review Route
Route::post('/houses/{house}/reviews', 'ReviewController@store');

// Message Route
Route::post('/houses/{house}/message', 'host\MessageController@store');

// Contact Us Route
Route::get('/contact-us', 'ContactController@index');
Route::post('/contact-us', 'ContactController@store');

//Gallery Route
Route::get('/gallery', 'GalleryController@index');
Route::get('/gallery/data/{number}', 'GalleryController@loadData');


// Favourite Route
Route::get('/favourite/{house}', 'FavouriteController@store')->name('favourite.store');
Route::get('/favourite', 'FavouriteController@show')->name('favourite.show');
Route::delete('/favourite/{house}', 'FavouriteController@delete')->name('favourite.delete');

// About for App
Route::get('about', function() {
    return view('homes.about');
});

// Property route (test)
Route::get('/property', 'PropertyController@grid');
Route::get('/property/list', 'PropertyController@list');

// Search Route
Route::post('/search', 'SearchController@search');

// Profile Route
Route::resource('profiles', 'ProfileController');

Route::group(['middleware' => 'auth', 'prefix' => 'backend/user'],
    function () {

    Route::group(['middleware' =>'admin', 'prefix' => 'admin/'],
        function () {
        // Dashboard | Contact Message
        Route::get('/', 'Admin\AdminController@index')
              ->name('admin.home');
        Route::get('message', 'Admin\AdminController@getData')
              ->name('messages.data');
        Route::get('messages/{message}/edit',
                        'Admin\MessageController@edit')
              ->name('messages.edit');
        Route::patch('messages/{message}', 'Admin\MessageController@edit')
              ->name('messages.update');
        Route::delete('messages/{message}',
                        'Admin\MessageController@destroy')
              ->name('messages.delete');
        Route::post('messages/{user}',
                        'Admin\MessageController@confirm')
              ->name('messages.confirm');


        // houses
        Route::get('houses', 'Admin\HouseController@index')
              ->name('houses.index') // index
              ->middleware('can:show-house');
        Route::get('houses/data', 'Admin\HouseController@getData')
              ->name('houses.data'); //data
        Route::get('houses/{house}', 'Admin\HouseController@show')
              ->name('admin-houses.show') // show
              ->middleware('can:show-house');
        Route::get('houses/{house}/edit', 'Admin\HouseController@edit')
              ->name('admin-houses.edit') // edit
              ->middleware('can:update-house,house');
        Route::patch('houses/{house}', 'Admin\HouseController@update')
              ->name('admin-houses.update') // update
              ->middleware('can:update-house,house');
        Route::delete('houses/{house}', 'Admin\HouseController@destroy')
              ->name('admin-houses.delete') //destroy
              ->middleware('can:delete-house');
        // /backend/user/admin/unpublish
        Route::get('unpublish', 'Admin\HouseController@unpublish')
              ->name('houses.unpublish');
        Route::get('unpublish/data', 'Admin\HouseController@unpublishData')
              ->name('houses.unpublishData');

        Route::get('publish', 'Admin\HouseController@publish')
              ->name('houses.publish');
        Route::get('publish/data', 'Admin\HouseController@publishData')
              ->name('houses.publishData');

        Route::get('houses/{house}/approve', 'Admin\HouseController@approve')
              ->name('houses.approve')
              ->middleware('can:approve-house');
        Route::get('houses/{house}/block', 'Admin\HouseController@block')
              ->name('houses.block')
              ->middleware('can:block-house');


        // Users
        Route::get('users', 'Admin\UserController@index')
              ->name('users.index');
        Route::get('users/data', 'Admin\UserController@getData')
              ->name('users.data');
        Route::get('users/create', 'Admin\UserController@create')
              ->name('users.create');
        Route::post('users', 'Admin\UserController@store')
              ->name('users.store');
        Route::get('users/host', 'Admin\UserController@host')
              ->name('users.host');
        Route::get('users/host/data', 'Admin\UserController@hostData')
              ->name('users.host-data');
        Route::get('users/vistor', 'Admin\UserController@vistor')
              ->name('users.vistor');
        Route::get('users/vistor/data', 'Admin\UserController@vistorData')
              ->name('users.vistor-data');

    });
});

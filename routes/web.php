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

// Region Route
Route::get('regions', 'RegionController@index')
      ->name('regions.index');
Route::get('regions/data', 'RegionController@getData')
      ->name('regions.data');
Route::get('regions/{region}/houseData', 'RegionController@regionData')
      ->name('region-houses.data');
Route::resource('regions', 'RegionController')->except('index');

// Types Route
Route::get('types', 'HouseTypeController@index')
      ->name('types.index');
Route::get('types/data', 'HouseTypeController@getData')
      ->name('types.data');
Route::get('types/{type}/houseData', 'HouseTypeController@typeData')
      ->name('types-houses.data');
Route::resource('types', 'HouseTypeController')->except('index');

// Features Route
Route::get('features', 'FeatureController@index')
      ->name('features.index');
Route::get('features/data', 'FeatureController@getData')
      ->name('features.data');
Route::get('features/{type}/houseData', 'FeatureController@featureData')
      ->name('features-houses.data');
Route::resource('features', 'FeatureController')->except('index');

// Message Route
Route::resource('guest-messages', 'GuestMessageController')->except('store');
Route::post('guest-messages/{house}', 'GuestMessageController@store')->name('guest-messages.store');

Route::group(['middleware' => 'auth', 'prefix' => 'backend/user'],
    function () {

    Route::group(['middleware' =>'admin', 'prefix' => 'admin/'],
        function () {
        // Dashboard | Contact Message
        Route::get('/', 'Admin\AdminController@index')
              ->name('admin.home');
        Route::get('contact-messages',
                        'Admin\ContactMessageController@getData')
              ->name('contact-messages.data');
        Route::get('contact-messages/{message}/edit',
                        'Admin\ContactMessageController@edit')
              ->name('contact-messages.edit');
        Route::patch('contact-messages/{message}',
                        'Admin\ContactMessageController@edit')
              ->name('contact-messages.update');
        Route::delete('contact-messages/{message}',
                        'Admin\ContactMessageController@destroy')
              ->name('contact-messages.delete');
        Route::post('contact-messages/{user}',
                        'Admin\ContactMessageController@confirm')
              ->name('contact-messages.confirm');

        // houses
        Route::get('houses', 'Admin\HouseController@index')
              ->name('houses.index') // index , house-all(view)
              ->middleware('can:show-house');
        Route::get('houses/data', 'Admin\HouseController@getData')
              ->name('houses.data'); //data , house-all(data)
        Route::get('houses/create', 'Admin\HouseController@create')
              ->name('admin-houses.create') // create
              ->middleware('can:create-house');
        Route::post('houses', 'Admin\HouseController@store')
              ->name('admin-houses.store') // store
              ->middleware('can:create-house');
        Route::get('houses/{house}', 'Admin\HouseController@show')
              ->name('admin-houses.show') // show
              ->middleware('can:show-house');
        Route::get('houses/{house}/edit', 'Admin\HouseController@edit')
              ->name('admin-houses.edit') // edit
              ->middleware('can:update-house');
        Route::patch('houses/{house}', 'Admin\HouseController@update')
              ->name('admin-houses.update') // update
              ->middleware('can:update-house');
        Route::delete('houses/{house}', 'Admin\HouseController@destroy')
              ->name('admin-houses.delete') // destroy
              ->middleware('can:delete-house');
        // unpublish-houses
        Route::get('unpublish', 'Admin\HouseController@unpublish')
              ->name('houses.unpublish'); // (view)
        Route::get('unpublish/data', 'Admin\HouseController@unpublishData')
              ->name('houses.unpublishData'); // (data)
        // publish-houses
        Route::get('publish', 'Admin\HouseController@publish')
              ->name('houses.publish'); // (view)
        Route::get('publish/data', 'Admin\HouseController@publishData')
              ->name('houses.publishData'); // (data)
        // featured-houses
        Route::get('feature', 'Admin\HouseController@featureHouse')
              ->name('houses.featureHouse') // (view)
              ->middleware('can:show-featuredHouse');
        Route::get('feature/data', 'Admin\HouseController@featureData')
              ->name('houses.featureData') // (data)
              ->middleware('can:show-featuredHouse');
        // to publish
        Route::get('houses/{house}/approve', 'Admin\HouseController@approve')
              ->name('houses.approve')
              ->middleware('can:approve-house');
        // to draft
        Route::get('houses/{house}/block', 'Admin\HouseController@saveDraft')
              ->name('houses.block')
              ->middleware('can:block-house');

        Route::get('houses/{house}/feature', 'Admin\HouseController@feature')
              ->name('houses.feature');
        Route::get('houses/{house}/unfeature', 'Admin\HouseController@unfeature')
              ->name('houses.unfeature');


        // Users
        Route::get('users', 'Admin\UserController@index')
              ->name('users.index')
              ->middleware('can:show-user');
        Route::get('users/data', 'Admin\UserController@getData')
              ->name('users.data');
        Route::get('users/create', 'Admin\UserController@create')
              ->name('users.create')
              ->middleware('can:create-user');
        Route::post('users', 'Admin\UserController@store')
              ->name('users.store')
              ->middleware('can:create-user');
        Route::get('users/{user}/edit', 'Admin\UserController@edit')
              ->name('users.edit');
        Route::patch('users/{user}', 'Admin\UserController@update')
              ->name('users.update');
        Route::delete('users/{user}', 'Admin\UserController@destroy')
              ->name('users.destroy')
              ->middleware('can:delete-user');
        Route::get('users/host', 'Admin\UserController@host')
              ->name('users.host')
              ->middleware('can:show-user');
        Route::get('users/host/data', 'Admin\UserController@hostData')
              ->name('users.host-data');
        Route::get('users/vistor', 'Admin\UserController@vistor')
              ->name('users.vistor')
              ->middleware('can:show-user');
        Route::get('users/vistor/data', 'Admin\UserController@vistorData')
              ->name('users.vistor-data');
        Route::get('users/admin', 'Admin\UserController@admin')
              ->name('users.admin')
              ->middleware('can:show-user');
        Route::get('users/admin/data', 'Admin\UserController@adminData')
              ->name('users.admin-data');
        Route::get('users/superadmin', 'Admin\UserController@superadmin')
              ->name('users.superadmin')
              ->middleware('can:show-user');
        Route::get('users/superadmin/data',
                'Admin\UserController@superadminData')
              ->name('users.superadmin-data');

        // Roles
        Route::get('roles', 'Admin\RoleController@index')
              ->name('roles.index');
        Route::get('roles/data', 'Admin\RoleController@getData')
              ->name('roles.data');

        Route::resource('roles', 'Admin\RoleController')->except('index');

    });

    // Host
    Route::group(['middleware' =>'host', 'prefix' => 'host/'], function () {

        // Dashboard | Contact Message
        Route::get('/', 'Host\HostController@index')
              ->name('host.home');
        // houses
        Route::get('host-houses', 'Host\HouseController@index')
              ->name('host-houses.index') // index
              ->middleware('can:show-house');
        Route::get('host-houses/data', 'Host\HouseController@getData')
              ->name('host-houses.data'); //data
        Route::get('host-houses/create', 'Host\HouseController@create')
              ->name('host-houses.create') // create
              ->middleware('can:create-house');
        Route::post('host-houses', 'Host\HouseController@store')
              ->name('host-houses.store') // create
              ->middleware('can:create-house');
        Route::get('host-houses/{house}', 'Host\HouseController@show')
              ->name('host-houses.show') // show
              ->middleware('can:show-house');
              // backend/user/admin/host-houses/create
        Route::get('host-houses/{house}/edit', 'Host\HouseController@edit')
              ->name('host-houses.edit') // edit
              ->middleware('can:update-house');
        Route::patch('host-houses/{house}', 'Host\HouseController@update')
              ->name('host-houses.update') // update
              ->middleware('can:update-house');
        Route::delete('host-houses/{house}', 'Host\HouseController@destroy')
              ->name('host-houses.delete') //destroy
              ->middleware('can:delete-house');
        // unpublish-host-houses
        Route::get('unpublish', 'Host\HouseController@unpublish')
              ->name('host-houses.unpublish');
        Route::get('unpublish/data', 'Host\HouseController@unpublishData')
              ->name('host-houses.unpublishData');
        // publish-host-houses
        Route::get('publish', 'Host\HouseController@publish')
              ->name('host-houses.publish');
        Route::get('publish/data', 'Host\HouseController@publishData')
              ->name('host-houses.publishData');
        // featured-host-houses
        Route::get('featureHouse', 'Host\HouseController@featureHouse')
              ->name('host-houses.featureHouse');
        Route::get('feature/data', 'Host\HouseController@featureData')
              ->name('host-houses.featureData');

        Route::get('host-houses/{house}/approve', 'Host\HouseController@approve')
              ->name('host-houses.approve')
              ->middleware('can:approve-house');
        Route::get('host-houses/{house}/block', 'Host\HouseController@block')
              ->name('host-houses.block')
              ->middleware('can:block-house');

    });
});

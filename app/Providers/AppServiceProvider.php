<?php

namespace App\Providers;

use App\House;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['admin-layouts.main_header', 'admin-layouts.aside'], function ($view) {
            $view->with('user', auth()->user());
        });

        view()->composer('admin-layouts.main_header', function ($view) {
            $view->with('message', \App\GuestMessage::where('user_id', auth()->id())->first());
        });

        view()->composer('layouts.topbar', function ($view) {
            $view->with('numOfContactMessage', \App\ContactMessage::all()->count());
        });

        view()->composer(['layouts.topbar', 'admin-layouts.main_header'], function ($view) {
            $view->with('numOfGuestMessage', \App\GuestMessage::where('user_id', auth()->id())->count());
        });

        view()->composer('*', function ($view) {
            $view->with('regions', \App\Region::all());
        });

        view()->composer('*', function ($view) {
            $view->with('types', \App\HouseType::all());
        });

        view()->composer('*', function ($view) {
            $view->with('path', asset('/storage/photos/'));
        });

        view()->composer('*', function ($view) {
            $view->with('thumbnails', asset('/storage/photos/thumbnails'));
        });

        view()->composer('homes.property.featured-widget', function ($view) {
            $view->with('featured_houses', \App\House::featuredHouse()->get());
        });


        view()->composer('homes.property.location-widget', function ($view) {
            $view->with('locations', \App\Location::groupBy('township')->get());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

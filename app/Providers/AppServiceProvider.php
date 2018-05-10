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
        view()->composer('*', function ($view) {
            $view->with('regions', \App\Region::all());
        });

        view()->composer('*', function ($view) {
            $view->with('types', \App\HouseType::all());
        });

        view()->composer('*', function ($view) {
            $view->with('path', asset('/storage/photos/'));
        });

        view()->composer('homes.property.featured-widget', function ($view) {
            $view->with('featured_houses', \App\House::featuredHouses());
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

<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Mediconesystems\LivewireDatatables\LivewireDatatablesServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Paginator::useTailwind();
        LivewireDatatablesServiceProvider::publishableProviders();
        LivewireDatatablesServiceProvider::publishableGroups();
    }
}

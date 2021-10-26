<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\LoginRepositoryInterface',
            'App\Repositories\LoginRepository'
        );

        $this->app->bind(
            'App\Repositories\CustomerRepositoryInterface',
            'App\Repositories\CustomerRepository'
        );

        $this->app->bind(
            'App\Repositories\WaiterRepositoryInterface',
            'App\Repositories\WaiterRepository'
        );

        $this->app->bind(
            'App\Repositories\EventRepositoryInterface',
            'App\Repositories\EventRepository'
        );

        $this->app->bind(
            'App\Repositories\EventTypeRepositoryInterface',
            'App\Repositories\EventTypeRepository'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

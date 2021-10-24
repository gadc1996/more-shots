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

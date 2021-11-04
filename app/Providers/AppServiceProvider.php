<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\LoginRepository;
use App\Repositories\LoginRepositoryInterface;
use App\Repositories\CustomerRepository;
use App\Repositories\CustomerRepositoryInterface;
use App\Repositories\WaiterRepository;
use App\Repositories\WaiterRepositoryInterface;
use App\Repositories\EventRepository;
use App\Repositories\EventRepositoryInterface;
use App\Repositories\EventTypeRepository;
use App\Repositories\EventTypeRepositoryInterface;

use App\Customer;
use App\Interfaces\CustomerInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(LoginRepositoryInterface::class, LoginRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(WaiterRepositoryInterface::class ,WaiterRepository::class);
        $this->app->bind(EventRepositoryInterface::class, EventRepository::class);
        $this->app->bind(EventTypeRepositoryInterface::class, EventTypeRepository::class);
        $this->app->bind(CustomerInterface::class, Customer::class);
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

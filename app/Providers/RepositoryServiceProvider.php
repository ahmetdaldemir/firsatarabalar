<?php

namespace App\Providers;

use App\Repositories\Cars\CarRepository;
use App\Repositories\Cars\CarRepositoryInterface;

use App\Repositories\CustomerCar\CustomerCarInterface;
use App\Repositories\CustomerCar\CustomerCarRepository;
use App\Repositories\CustomerCarValuation\CustomerCarValuationInterface;
use App\Repositories\CustomerCarValuation\CustomerCarValuationRepository;

use App\Repositories\Customers\CustomerRepository;
use App\Repositories\Customers\CustomerRepositoryInterface;

use App\Repositories\Experts\ExpertRepository;
use App\Repositories\Experts\ExpertRepositoryInterface;

use App\Repositories\Cities\CityRepository;
use App\Repositories\Cities\CityRepositoryInterface;

use App\Repositories\Pages\PageRepository;
use App\Repositories\Pages\PageRepositoryInterface;
use App\Repositories\Town\TownRepository;
use App\Repositories\Town\TownRepositoryInterface;

 use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ExpertRepositoryInterface::class, ExpertRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
        $this->app->bind(CityRepositoryInterface::class, CityRepository::class);
        $this->app->bind(TownRepositoryInterface::class, TownRepository::class);
        $this->app->bind(CarRepositoryInterface::class, CarRepository::class);
        $this->app->bind(CustomerCarValuationInterface::class, CustomerCarValuationRepository::class);
        $this->app->bind(CustomerCarInterface::class, CustomerCarRepository::class);
        $this->app->bind(PageRepositoryInterface::class, PageRepository::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

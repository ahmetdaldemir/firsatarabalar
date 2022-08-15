<?php

namespace App\Providers;

use App\Repositories\Brands\BrandRepository;
use App\Repositories\Brands\BrandRepositoryInterface;
use App\Repositories\Cars\CarRepository;
use App\Repositories\Cars\CarRepositoryInterface;

use App\Repositories\CustomerCar\CustomerCarInterface;
use App\Repositories\CustomerCar\CustomerCarRepository;


use App\Repositories\Customers\CustomerRepository;
use App\Repositories\Customers\CustomerRepositoryInterface;

use App\Repositories\Experts\ExpertRepository;
use App\Repositories\Experts\ExpertRepositoryInterface;

use App\Repositories\Cities\CityRepository;
use App\Repositories\Cities\CityRepositoryInterface;

use App\Repositories\Pages\PageRepository;
use App\Repositories\Pages\PageRepositoryInterface;
use App\Repositories\Reviews\ReviewRepository;
use App\Repositories\Reviews\ReviewRepositoryInterface;
use App\Repositories\Roles\RoleRepository;
use App\Repositories\Roles\RoleRepositoryInterface;
use App\Repositories\Settings\SettingRepository;
use App\Repositories\Settings\SettingRepositoryInterface;
use App\Repositories\Town\TownRepository;
use App\Repositories\Town\TownRepositoryInterface;

use App\Repositories\Users\UserRepository;
use App\Repositories\Users\UserRepositoryInterface;
use App\Repositories\Valuation\ValuationRepository;
use App\Repositories\Valuation\ValuationRepositoryInterface;
use App\Repositories\VehicleRequest\VehicleRequestRepository;
use App\Repositories\VehicleRequest\VehicleRequestRepositoryInterface;
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
        $this->app->bind(CustomerCarInterface::class, CustomerCarRepository::class);
        $this->app->bind(PageRepositoryInterface::class, PageRepository::class);
        $this->app->bind(ValuationRepositoryInterface::class, ValuationRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(SettingRepositoryInterface::class, SettingRepository::class);
        $this->app->bind( VehicleRequestRepositoryInterface::class,  VehicleRequestRepository::class);
        $this->app->bind( BrandRepositoryInterface::class,  BrandRepository::class);
        $this->app->bind( ReviewRepositoryInterface::class,  ReviewRepository::class);

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

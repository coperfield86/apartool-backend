<?php

namespace App\Providers;

use Apartool\ApartmentCategory\Domain\ApartmentCategoryRepository;
use Apartool\Apartment\Domain\ApartmentRepository;
use Apartool\ApartmentCategory\Infrastructure\Persistence\EloquentApartmentCategoryRepository;
use Apartool\Apartment\Infrastructure\Persistence\EloquentApartmentRepository;
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
        $this->app->bind(ApartmentRepository::class, EloquentApartmentRepository::class);
        $this->app->bind(ApartmentCategoryRepository::class, EloquentApartmentCategoryRepository::class);
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

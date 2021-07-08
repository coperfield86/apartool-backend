<?php

namespace App\Providers;

use Apartool\Apartment\Application\Create\ApartmentCreator;
use Apartool\Apartment\Domain\ApartmentRepository;
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
        /*$this->app->bind(ApartmentCreator::class, function ($app) {
            return new ApartmentCreator();
        });*/
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

<?php

namespace App\Providers;

use App\Repository\Car\CarRepository;
use App\Repository\Car\EloquentCarRepository;
use App\Repository\EloquentUserRepository;
use App\Repository\UserRepository;
use Illuminate\Support\ServiceProvider;

class UserRepositoryProviders extends ServiceProvider
{
    /**
     * Register services.
     */
    public array $bindings = [
        UserRepository::class => EloquentUserRepository::class,
        CarRepository::class => EloquentCarRepository::class,
    ];

    public function register(): void
    {
//        $this->app->bind(
//            UserRepository::class,
//            EloquentUserRepository::class
//        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

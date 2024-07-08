<?php

namespace App\Providers;

use App\Contracts\SurferRepositoryInterface;
use App\Repositories\SurferRepository;
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
        $this->surferRepository();
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

    public function surferRepository()
    {
        $this->app->bind(
            SurferRepositoryInterface::class,
            SurferRepository::class,
        );
    }
}

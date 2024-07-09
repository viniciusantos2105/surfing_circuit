<?php

namespace App\Providers;

use App\Contracts\HeatRepositoryInterface;
use App\Contracts\NoteRepositoryInterface;
use App\Contracts\SurferRepositoryInterface;
use App\Contracts\WaveRepositoryInterface;
use App\Repositories\HeatRepository;
use App\Repositories\NoteRepository;
use App\Repositories\SurferRepository;
use App\Repositories\WaveRepository;
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
        $this->noteRepository();
        $this->waveRepository();
        $this->heatRepository();
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

    public function noteRepository()
    {
        $this->app->bind(
            NoteRepositoryInterface::class,
            NoteRepository::class,
        );
    }

    public function waveRepository()
    {
        $this->app->bind(
            WaveRepositoryInterface::class,
            WaveRepository::class,
        );
    }

    public function heatRepository()
    {
        $this->app->bind(
            HeatRepositoryInterface::class,
            HeatRepository::class,
        );
    }
}

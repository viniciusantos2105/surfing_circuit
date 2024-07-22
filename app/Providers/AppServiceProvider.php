<?php

namespace App\Providers;

use App\Contracts\Repositories\HeatRepositoryInterface;
use App\Contracts\Repositories\NoteRepositoryInterface;
use App\Contracts\Repositories\SurferRepositoryInterface;
use App\Contracts\Repositories\WaveRepositoryInterface;
use App\Contracts\Services\HeatServiceInterface;
use App\Contracts\Services\NoteServiceInterface;
use App\Contracts\Services\SurferServiceInterface;
use App\Contracts\Services\WaveServiceInterface;
use App\Repositories\HeatRepository;
use App\Repositories\NoteRepository;
use App\Repositories\SurferRepository;
use App\Repositories\WaveRepository;
use App\Services\HeatService;
use App\Services\NoteService;
use App\Services\SurferService;
use App\Services\WaveService;
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
        $this->surferService();
        $this->noteRepository();
        $this->noteService();
        $this->waveRepository();
        $this->waveService();
        $this->heatRepository();
        $this->heatService();
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

    public function surferService()
    {
        $this->app->bind(
            SurferServiceInterface::class,
            SurferService::class,
        );
    }

    public function noteRepository()
    {
        $this->app->bind(
            NoteRepositoryInterface::class,
            NoteRepository::class,
        );
    }

    public function noteService()
    {
        $this->app->bind(
            NoteServiceInterface::class,
            NoteService::class,
        );
    }

    public function waveRepository()
    {
        $this->app->bind(
            WaveRepositoryInterface::class,
            WaveRepository::class,
        );
    }

    public function waveService()
    {
        $this->app->bind(
            WaveServiceInterface::class,
            WaveService::class,
        );
    }

    public function heatRepository()
    {
        $this->app->bind(
            HeatRepositoryInterface::class,
            HeatRepository::class,
        );
    }

    public function heatService()
    {
        $this->app->bind(
            HeatServiceInterface::class,
            HeatService::class,
        );
    }
}

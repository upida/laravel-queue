<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Foundation\Application;
use App\Jobs\ProcessConvert;
use App\Services\ConvertService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bindMethod([ProcessConvert::class, 'handle'], function (ProcessConvert $job, Application $app) {
            return $job->handle($app->make(ConvertService::class, ['message' => 'OK']));
        });
    }
}

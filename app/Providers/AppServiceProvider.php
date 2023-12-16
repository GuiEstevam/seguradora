<?php

namespace App\Providers;

use App\Services\CnpjFormatterService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CnpjFormatterService::class, function ($app) {
            return new CnpjFormatterService();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

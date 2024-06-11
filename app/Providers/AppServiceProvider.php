<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {


    }

    /**
     * Bootstrap any application services.
     */
    public function boot(Router $router): void
    {

        Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
        $router->aliasMiddleware('admin', \App\Http\Middleware\adminMiddleware::class);

    }
}

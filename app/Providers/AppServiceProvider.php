<?php

namespace App\Providers;

use Illuminate\Foundation\Http\Middleware\TrimStrings;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

use Illuminate\Routing\Router;
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
    
    public function boot()
    {
        TrimStrings::except(['/ticket/*']);
    }
}

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Features\Auth\Services;   
use App\Features\Auth\Contracts\IUser;
use App\Features\Auth\Services\IUserService;
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
    public function boot(): void
    {
        //
    }
}

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
        $this->app->bind(abstract: IUser::class, concrete: IUserService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

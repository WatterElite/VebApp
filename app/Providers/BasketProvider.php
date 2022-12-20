<?php

namespace App\Providers;

use App\Http\Services\Interfaces\BasketContract;
use App\Http\Services\BasketServices;
use Illuminate\Support\ServiceProvider;

class BasketProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BasketContract::class, BasketServices::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

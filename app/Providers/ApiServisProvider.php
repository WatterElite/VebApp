<?php

namespace App\Providers;

use App\Http\Services\Interfaces\ApiServisContract;
use App\Http\Services\ApiBotBoomServices;
use Illuminate\Support\ServiceProvider;

class ApiServisProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ApiServisContract::class, ApiBotBoomServices::class);
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

<?php

namespace App\Providers;

use App\Http\Services\Interfaces\ProductsContract;
use App\Http\Services\ProductsServices;
use Illuminate\Support\ServiceProvider;

class ProductsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductsContract::class, ProductsServices::class);
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

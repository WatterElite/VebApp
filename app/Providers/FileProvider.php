<?php

namespace App\Providers;

use App\Http\Services\Interfaces\FileContract;
use App\Http\Services\FileServices;

use Illuminate\Support\ServiceProvider;

class FileProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(FileContract::class, FileServices::class);
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

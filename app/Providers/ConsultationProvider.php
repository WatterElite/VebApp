<?php

namespace App\Providers;

use App\Http\Services\Interfaces\ConsultationContract;
use App\Http\Services\ConsultationServices;

use Illuminate\Support\ServiceProvider;

class ConsultationProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ConsultationContract::class, ConsultationServices::class);
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

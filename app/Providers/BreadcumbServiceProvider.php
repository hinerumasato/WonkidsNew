<?php

namespace App\Providers;

use App\Http\Controllers\Vendor\BreadcumbController;
use Illuminate\Support\ServiceProvider;

class BreadcumbServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BreadcumbController::class, function($app) {
            return new BreadcumbController();
        });
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

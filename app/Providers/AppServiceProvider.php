<?php

namespace App\Providers;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Partials\CategoryController;
use App\Http\Controllers\Partials\HeaderController;
use App\Http\Controllers\Partials\SmallNavController;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();

        View::composer('client.partials.header', function($view) {
            app()->call([HeaderController::class, 'index'], ['view' => $view]);
        });

        View::composer('client.partials.sidenav', function($view) {
            app()->call([HeaderController::class, 'index'], ['view' => $view]);
        });

        View::composer('client.partials.small-nav', function($view) {
            app()->call([SmallNavController::class, 'index'], ['view' => $view]);
        });

        View::composer('client.partials.category-img', function($view) {
            app()->call([CategoryController::class, 'index'], ['view' => $view]);
        });
    }
}

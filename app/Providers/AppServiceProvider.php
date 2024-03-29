<?php

namespace App\Providers;

use App\Breadcumb\Breadcumb;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Partials\AdminLayoutController;
use App\Http\Controllers\Partials\CategoryController;
use App\Http\Controllers\Partials\HeaderController;
use App\Http\Controllers\Partials\SliderController;
use App\Http\Controllers\Partials\SmallNavController;
use App\Http\Controllers\Partials\SmallSliderController;
use App\Http\Controllers\Vendor\BreadcumbController;
use App\Models\User;
use Flat3\Lodata\Facades\Lodata;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;
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

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (env('APP_ENV') === 'production') {
            URL::forceScheme('https');
        }

        //Paginator
        Paginator::useBootstrapFive();

        //Breadcumb

        //Client
        View::composer('client.partials.header', function($view) {
            app()->call([HeaderController::class, 'index'], ['view' => $view]);
        });

        View::composer('client.partials.test-header', function($view) {
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

        View::composer('client.partials.slider', function($view) {
            app()->call([SliderController::class, 'index'], ['view' => $view]);
        });

        View::composer('client.partials.small-slider', function($view) {
            app()->call([SmallSliderController::class, 'index'], ['view' => $view]);
        });

        //Admin
        View::composer('admin.layouts.master', function($view) {
            app()->call([AdminLayoutController::class, 'index'], ['view' => $view]);
        });

        // Lodata
        Lodata::discover(User::class);
    }
}

<?php

namespace App\Breadcumb;

use App\Http\Controllers\Vendor\BreadcumbController;
use Illuminate\Support\Facades\View;

class Breadcumb {
    public static function createBreadcumb(string $divider = '', array $options = [] , string $current = 'HOME') {
        View::composer('vendor.breadcumb.default', function($view) use ($divider, $options, $current) {

            $variables =  [
                'view' => $view,
                'divider' => $divider,
                'options' => $options,
                'current' => $current,
            ];

            app()->call([BreadcumbController::class, 'index'], $variables);
        });
    }
}
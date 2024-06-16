<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BreadcumbController extends Controller
{
    public static function index($view, $divider, $options, $current) {
        $view->with(compact('divider', 'options', 'current'));
    }
}

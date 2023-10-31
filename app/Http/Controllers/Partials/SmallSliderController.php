<?php

namespace App\Http\Controllers\Partials;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SmallSliderController extends Controller
{
   
    public static function index($view) {
        $smallSliderTitle = 'Document';
        $smallSliderDescription = '';
        $view->with([
            'smallSliderTitle' => $smallSliderTitle,
            'smallSliderDescription' => $smallSliderDescription,
        ]);
    }
}

<?php

namespace App\Http\Controllers\Partials;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public static function index($view) {
        $sliderModel = new Slider();
        $view->with([
            'sliders' => $sliderModel->all(),
        ]);
    }
}

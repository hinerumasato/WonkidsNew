<?php

namespace App\Http\Controllers\Partials;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\SliderDescription;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public static function index($view) {
        $sliderModel = new Slider();
        $sliderDescriptionModel = new SliderDescription();

        $description = $sliderDescriptionModel->getDescriptionByLocale(app()->getLocale());
        $view->with([
            'sliders' => $sliderModel->all(),
            'description' => $description,
        ]);
    }
}

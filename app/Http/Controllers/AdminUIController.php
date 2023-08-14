<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Slider;
use App\Models\SliderDescription;
use Illuminate\Http\Request;

class AdminUIController extends Controller
{
    private $languageModel;
    private $sliderModel;
    private $sliderDescriptionModel;

    public function __construct()
    {
        $this->languageModel = new Language();
        $this->sliderModel = new Slider();
        $this->sliderDescriptionModel = new SliderDescription();
    }

    public function slider() {
        $currentLanguage = $this->languageModel->findByLocale(app()->getLocale());
        $allLanguages = $this->languageModel->all();
        $sliders = $this->sliderModel->all();
        $descriptions = $this->sliderDescriptionModel->getAllDescription();

        return view('admin.UI.slider', compact(
            'currentLanguage', 'allLanguages', 'sliders', 'descriptions',
        ));
    }
}

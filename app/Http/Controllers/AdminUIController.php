<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Models\Slider;
use Illuminate\Http\Request;

class AdminUIController extends Controller
{
    private $languageModel;
    private $sliderModel;

    public function __construct()
    {
        $this->languageModel = new Language();
        $this->sliderModel = new Slider();
    }

    public function slider() {
        $currentLanguage = $this->languageModel->findByLocale(app()->getLocale());
        $allLanguages = $this->languageModel->all();
        $sliders = $this->sliderModel->all();
        return view('admin.UI.slider', compact(
            'currentLanguage', 'allLanguages', 'sliders',
        ));
    }
}

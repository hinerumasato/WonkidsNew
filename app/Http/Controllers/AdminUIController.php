<?php

namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class AdminUIController extends Controller
{
    private $languageModel;

    public function __construct()
    {
        $this->languageModel = new Language();
    }

    public function slider() {
        $currentLanguage = $this->languageModel->findByLocale(app()->getLocale());
        $allLanguages = $this->languageModel->all();
        return view('admin.UI.slider', compact(
            'currentLanguage', 'allLanguages',
        ));
    }
}

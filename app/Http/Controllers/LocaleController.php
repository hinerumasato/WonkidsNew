<?php

namespace App\Http\Controllers;

use App\Helpers\LocaleHelper;
use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function changeLocale($locale) {        
        LocaleHelper::changeLocale($locale);
        return redirect()->back();
    }
}

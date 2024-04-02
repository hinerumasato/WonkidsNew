<?php

namespace App\Http\Controllers;

use App\Helpers\LocaleHelper;
use Illuminate\Http\Request;
use Spatie\ResponseCache\Facades\ResponseCache;

class LocaleController extends Controller
{
    public function changeLocale($locale) {
        LocaleHelper::changeLocale($locale);
        ResponseCache::clear();
        return redirect()->back();
    }
}

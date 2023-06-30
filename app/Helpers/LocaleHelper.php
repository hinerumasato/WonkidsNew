<?php

namespace App\Helpers;

class LocaleHelper {
    public static function changeLocale($locale) {
        session()->put('locale', $locale);
        app()->setLocale($locale);
    }
}
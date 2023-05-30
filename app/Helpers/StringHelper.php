<?php


namespace App\Helpers;
use Illuminate\Support\Str;

class StringHelper {

    public static function toSlug($str) {
        return strtolower(str_replace(" ", "-", $str));
    }
}
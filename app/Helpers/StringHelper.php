<?php


namespace App\Helpers;
use Illuminate\Support\Str;

class StringHelper {

    public static function toSlug($str) {
        return strtolower(str_replace(" ", "-", $str));
    }

    public static function gerateLineByLevel($level) {
        $result = '';
        for($i = 0; $i < $level; $i++)
            $result .= "___";
        return $result;
    }
}
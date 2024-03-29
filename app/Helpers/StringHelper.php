<?php


namespace App\Helpers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StringHelper {

    private static function removeVietnameseSpecialCharacter($string) {
        $trans = array(
                'à'=>'a','á'=>'a','ả'=>'a','ã'=>'a','ạ'=>'a',
                'ă'=>'a','ằ'=>'a','ắ'=>'a','ẳ'=>'a','ẵ'=>'a','ặ'=>'a',
                'â'=>'a','ầ'=>'a','ấ'=>'a','ẩ'=>'a','ẫ'=>'a','ậ'=>'a',
                'À'=>'a','Á'=>'a','Ả'=>'a','Ã'=>'a','Ạ'=>'a',
                'Ă'=>'a','Ằ'=>'a','Ắ'=>'a','Ẳ'=>'a','Ẵ'=>'a','Ặ'=>'a',
                'Â'=>'a','Ầ'=>'a','Ấ'=>'a','Ẩ'=>'a','Ẫ'=>'a','Ậ'=>'a',
                'đ'=>'d','Đ'=>'d',
                'è'=>'e','é'=>'e','ẻ'=>'e','ẽ'=>'e','ẹ'=>'e',
                'ê'=>'e','ề'=>'e','ế'=>'e','ể'=>'e','ễ'=>'e','ệ'=>'e',
                'È'=>'e','É'=>'e','Ẻ'=>'e','Ẽ'=>'e','Ẹ'=>'e',
                'Ê'=>'e','Ề'=>'e','Ế'=>'e','Ể'=>'e','Ễ'=>'e','Ệ'=>'e',
                'ì'=>'i','í'=>'i','ỉ'=>'i','ĩ'=>'i','ị'=>'i',
                'Ì'=>'i','Í'=>'i','Ỉ'=>'i','Ĩ'=>'i','Ị'=>'i',
                'ò'=>'o','ó'=>'o','ỏ'=>'o','õ'=>'o','ọ'=>'o',
                'ô'=>'o','ồ'=>'o','ố'=>'o','ổ'=>'o','ỗ'=>'o','ộ'=>'o',
                'ơ'=>'o','ờ'=>'o','ớ'=>'o','ở'=>'o','ỡ'=>'o','ợ'=>'o',
                'Ò'=>'o','Ó'=>'o','Ỏ'=>'o','Õ'=>'o','Ọ'=>'o',
                'Ô'=>'o','Ồ'=>'o','Ố'=>'o','Ổ'=>'o','Ỗ'=>'o','Ộ'=>'o',
                'Ơ'=>'o','Ờ'=>'o','Ớ'=>'o','Ở'=>'o','Ỡ'=>'o','Ợ'=>'o',
                'ù'=>'u','ú'=>'u','ủ'=>'u','ũ'=>'u','ụ'=>'u',
                'ư'=>'u','ừ'=>'u','ứ'=>'u','ử'=>'u','ữ'=>'u','ự'=>'u',
                'Ù'=>'u','Ú'=>'u','Ủ'=>'u','Ũ'=>'u','Ụ'=>'u',
                'Ư'=>'u','Ừ'=>'u','Ứ'=>'u','Ử'=>'u','Ữ'=>'u','Ự'=>'u',
                'ỳ'=>'y','ý'=>'y','ỷ'=>'y','ỹ'=>'y','ỵ'=>'y',
                'Y'=>'y','Ỳ'=>'y','Ý'=>'y','Ỷ'=>'y','Ỹ'=>'y','Ỵ'=>'y'
            );
        return strtr($string, $trans);
    }

    public static function toSlug($str) {
        $result = mb_strtolower(str_replace(" ", "-", StringHelper::removeVietnameseSpecialCharacter($str)), 'UTF-8');
        $result = str_replace("/", "-", $result);
        return $result;
    }

    public static function gerateLineByLevel($level) {
        $result = '';
        for($i = 0; $i < $level; $i++)
            $result .= "___";
        return $result;
    }

    public static function randomString() {
        $length = random_int(0, 10);
        $result = '';
        for($i = 0; $i < $length; $i++)
            $result .= chr(random_int(0, 100));
        return $result;
    }

    public static function generateToken($data) {
        return str_replace('/', '_', bcrypt($data.StringHelper::randomString()));
    }

    public static function getParseUrlPath($oldPath) {
        $path = parse_url($oldPath, PHP_URL_PATH);
        $path = substr($path, 1);
        return $path;
    }

    public static function isImageFile($extension) {
        return $extension === 'jpg' || 
               $extension === 'png' || 
               $extension === 'jepg' ||
               $extension === 'gif' ||
               $extension === 'bmp';
    }

    public static function getExtension($fileName) {
        $arr = explode('.', $fileName);
        return $arr[count($arr) - 1];
    }

    public static function createBreadcumb($options): string {
        $result = '<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">';
        return $result;
    }
}
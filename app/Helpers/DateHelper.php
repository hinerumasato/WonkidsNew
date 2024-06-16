<?php
namespace App\Helpers;

use DateTime;

class DateHelper {
    public static function formatVietNamDate($strDate) {
        $formater = DateTime::createFromFormat('Y-m-d H:i:s', $strDate); 
        return $formater->format('d/m/Y');
    }
}
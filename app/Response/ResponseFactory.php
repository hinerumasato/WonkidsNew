<?php
namespace App\Response;

/**
 * This class will create a format response json to client
 */
class ResponseFactory {
    // private static $statusCode;
    // private static $message;
    // private static $object;

    /**
     * @param statusCode HttpResponse Code
     * @param message Response message
     * @param object Response object (can null)
     * @return array array of response [statusCode => $statusCode, message => $message, data => $object];
     */
    public static function response(int $statusCode, string $message, object $object = null) {
        return response()->json([
            'statusCode' => $statusCode,
            'message' => $message,
            'data' => $object
        ]);
    }
}
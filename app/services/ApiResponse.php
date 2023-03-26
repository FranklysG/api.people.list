<?php

namespace App\services;

class ApiResponse
{

    /**
     * @param  string  $message
     * @param  null  $headerCodeError - status code that will be return to front-end
     * @param  null  $errorCode - a hotspotty unique code
     * @return array
     */
    public function errorResponse(string $message,  $headerCodeError = null, $errorCode = null){
        header('HTTP/1.1 400 Bad Request');
        return json_encode([
            'headerCode' => $headerCodeError ?? 400,
            'status' => false,
            'message' => $message,
            'errorCode' => $errorCode
        ]);
    }

    /**
     * @param  string  $message
     * @param  array  $data
     * @param  int  $headerCode
     * @return array
     */
    public function successResponse(string $message, array $data, int $headerCode = 200){
        return json_encode([
            'headerCode' => $headerCode,
            'status' => true,
            'message' => ($message),
            'data' => $data
        ]);
    }

}
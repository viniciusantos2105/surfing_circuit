<?php

namespace App\Helpers;

use Exception;
use Illuminate\Http\JsonResponse;

class ErrorResponse
{
    public static function errorDuplicateResponse(Exception $error): JsonResponse
    {
        return response()->json(['Error' => $error], 500);
    }
}

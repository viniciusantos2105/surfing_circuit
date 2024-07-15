<?php

namespace App\Helpers;

use Illuminate\Http\JsonResponse;

class Response
{

    public static function createResponse($data): JsonResponse
    {
        return response()->json($data, 201);
    }

    public static function successResponse($data): JsonResponse
    {
        return response()->json($data, 200);
    }

    public static function noContentResponse(): JsonResponse
    {
        return response()->json(204);
    }


}

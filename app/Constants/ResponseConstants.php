<?php

namespace App\Constants;

use Illuminate\Http\JsonResponse;

class ResponseConstants
{
    const VALIDATION_ERROR_MESSAGE = "Seus dados de entrada contêm erros.";
    const VALIDATION_ERROR_STATUS = 422;

    public static function validationErrorResponse($validator): JsonResponse
    {
        return response()->json([
            'message' => self::VALIDATION_ERROR_MESSAGE,
            'errors' => $validator->errors()
        ], self::VALIDATION_ERROR_STATUS);
    }

    const MESSAGES_SURFER = [
        'surferName.required' => 'O campo nome do surfista é obrigatório.',
        'surferCountry.required' => 'O campo país é obrigatório.',
        'surferName.string' => 'O campo nome do surfista deve ser uma string.',
        'surferCountry.string' => 'O campo país deve ser uma string.',
    ];

    const MESSAGES_HEAT = [
        'heatSurfer1.required' => 'O campo surfista 1 é obrigatório.',
        'heatSurfer2.required' => 'O campo surfista 2 é obrigatório.',
        'heatSurfer1.integer' => 'O campo surfista 1 deve ser o número de inscrição.',
        'heatSurfer2.integer' => 'O campo surfista 2 deve ser o número de inscrição.',
    ];
}

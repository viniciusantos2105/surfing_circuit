<?php

namespace App\Constants;

class ResponseConstants
{
    const VALIDATION_ERROR_MESSAGE = "Seus dados de entrada contêm erros.";
    const VALIDATION_ERROR_STATUS = 422;

    public static function validationErrorResponse($validator)
    {
        return response()->json([
            'message' => self::VALIDATION_ERROR_MESSAGE,
            'errors' => $validator->errors()
        ], self::VALIDATION_ERROR_STATUS);
    }

    const MESSAGES = [
        'surferName.required' => 'O campo nome do surfista é obrigatório.',
        'surferCountry.required' => 'O campo país é obrigatório.',
    ];
}

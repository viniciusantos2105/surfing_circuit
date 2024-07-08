<?php

namespace App\Dto;

use App\Constants\ResponseConstants;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SurferCreateRequest extends FormRequest
{

    public function rules() : array
    {
        return[
            'surferName' => 'required|string',
            'surferCountry' => 'required|string'
        ];
    }

    public function messages() : array
    {
        return ResponseConstants::MESSAGES;
    }

    protected function failedValidation(Validator $validator)
    {
        $response = ResponseConstants::validationErrorResponse($validator);

        throw new HttpResponseException($response);
    }

    public function surferName() : string
    {
        return $this->get('surferName');
    }

    public function surferCountry() : string
    {
        return $this->get('surferCountry');
    }
}

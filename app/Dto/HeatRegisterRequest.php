<?php

namespace App\Dto;

use App\Constants\ResponseConstants;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class HeatRegisterRequest extends FormRequest
{
    public function rules() : array
    {
        return[
            '$heatSurfer1' => 'required|int',
            '$heatSurfer2' => 'required|int'
        ];
    }

    public function messages() : array
    {
        return ResponseConstants::MESSAGES_HEAT;
    }

    protected function failedValidation(Validator $validator)
    {
        $response = ResponseConstants::validationErrorResponse($validator);

        throw new HttpResponseException($response);
    }

    public function heatSurfer1() : int
    {
        return $this->get('$heatSurfer1');
    }

    public function heatSurfer2() : int
    {
        return $this->get('$heatSurfer2');
    }
}

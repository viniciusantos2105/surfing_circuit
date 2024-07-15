<?php

namespace App\Dto\request;

use App\Constants\RequiredsConstants;
use App\Constants\ValidationsConstants;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class HeatRegisterRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'heatSurfer1' => RequiredsConstants::REQUIRED_INTEGER,
            'heatSurfer2' => RequiredsConstants::REQUIRED_INTEGER
        ];
    }

    public function messages(): array
    {
        return ValidationsConstants::MESSAGES_HEAT;
    }

    protected function failedValidation(Validator $validator)
    {
        $response = ValidationsConstants::validationErrorResponse($validator);

        throw new HttpResponseException($response);
    }

    public function heatSurfer1(): int
    {
        return $this->get('heatSurfer1');
    }

    public function heatSurfer2(): int
    {
        return $this->get('heatSurfer2');
    }
}

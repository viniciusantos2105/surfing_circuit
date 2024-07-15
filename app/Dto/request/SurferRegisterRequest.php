<?php

namespace App\Dto\request;

use App\Constants\RequiredsConstants;
use App\Constants\ValidationsConstants;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SurferRegisterRequest extends FormRequest
{


    public function rules(): array
    {
        return [
            'surferName' => RequiredsConstants::REQUIRED_STRING,
            'surferCountry' => RequiredsConstants::REQUIRED_STRING
        ];
    }

    public function messages(): array
    {
        return ValidationsConstants::MESSAGES_SURFER;
    }

    protected function failedValidation(Validator $validator)
    {
        $response = ValidationsConstants::validationErrorResponse($validator);

        throw new HttpResponseException($response);
    }

    public function surferName(): string
    {
        return $this->get('surferName');
    }

    public function surferCountry(): string
    {
        return $this->get('surferCountry');
    }
}

<?php

namespace App\Dto\request;

use App\Constants\RequiredsConstants;
use App\Constants\ValidationsConstants;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class NoteRegisterRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'partialScore1' => RequiredsConstants::REQUIRED_NUMERIC,
            'partialScore2' => RequiredsConstants::REQUIRED_NUMERIC,
            'partialScore3' => RequiredsConstants::REQUIRED_NUMERIC
        ];
    }

    public function messages(): array
    {
        return ValidationsConstants::MESSAGES_NOTE;
    }

    protected function failedValidation(Validator $validator)
    {
        $response = ValidationsConstants::validationErrorResponse($validator);

        throw new HttpResponseException($response);
    }

    public function partialScore1(): float
    {
        return $this->get('partialScore1');
    }

    public function partialScore2(): float
    {
        return $this->get('partialScore2');
    }

    public function partialScore3(): float
    {
        return $this->get('partialScore3');
    }

}

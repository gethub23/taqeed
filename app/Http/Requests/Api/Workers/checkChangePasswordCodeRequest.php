<?php

namespace App\Http\Requests\Api\Workers;

use Illuminate\Foundation\Http\FormRequest;

use App\Traits\Responses;
use Illuminate\Contracts\Validation\Validator;

class checkChangePasswordCodeRequest extends FormRequest
{
    use Responses ;

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'code'    => 'required|numeric',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $this->validationResponse($validator);
    }
}

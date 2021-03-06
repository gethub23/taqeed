<?php

namespace App\Http\Requests\Api\Workers;

use Illuminate\Foundation\Http\FormRequest;

use App\Traits\Responses;
use Illuminate\Contracts\Validation\Validator;

class WorkerSignInRequest extends FormRequest
{
    use Responses ;
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
            'phone'           => 'required|exists:station_workers,phone',
            'password'        => 'required',
            'device_id'       => 'required',
            'type'            => 'required|in:worker,supervisor',
        ];
    }
    protected function failedValidation(Validator $validator)
    {
        $this->validationResponse($validator);
    }
}

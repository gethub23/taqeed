<?php

namespace App\Http\Requests\Api\Shifts;

use App\Traits\Responses;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class openShiftRequest extends FormRequest
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
            'fuel_proint_id' => 'required|exists:fuel_points,id' , 
            'start_count'    => 'required' , 
        ];
    }

    
    protected function failedValidation(Validator $validator)
    {
        $this->validationResponse($validator);
    }
}

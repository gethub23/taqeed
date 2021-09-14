<?php

namespace App\Http\Requests\Admin\stations;

use Illuminate\Foundation\Http\FormRequest;

class store extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        if($this->getMethod() === 'PUT'){
            $rules = [
                'name'                  => 'required|max:191',
                'phone'                 => 'required|numeric|unique:stations,phone,'.$this->id,
                'block'                => ['required'],
                'logo'                => ['nullable','image'],
            ];
            return $rules;
        }else{
            $rules = [
                'name'                  => 'required|max:191',
                'phone'                 => 'required|numeric|unique:stations,phone',
                'block'                => ['required'],
                'logo'                => ['required','image'],
            ];
            return $rules;
        }
    }
}

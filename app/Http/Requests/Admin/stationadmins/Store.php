<?php

namespace App\Http\Requests\Admin\stationadmins;

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
                'phone'                 => 'required|numeric|unique:users,phone,'.$this->id,
                'email'                 => 'required|email|max:191|unique:users,email,'.$this->id,
                'type'                  => 'required_if:type,good',
                'password'              => ['nullable','max:191'],
                'avatar'                => ['nullable','image'],
            ];
            return $rules;
        }else{
            $rules = [
                'name'                  => 'required|max:191',
                'phone'                 => 'required|numeric|unique:users,phone',
                'email'                 => 'required|email|max:191|unique:users,email',
                'password'              => ['required','max:191'],
            ];
            return $rules;
        }
    }
}

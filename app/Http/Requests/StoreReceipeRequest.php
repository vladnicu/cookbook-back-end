<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReceipeRequest extends FormRequest
{
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
        return [ // TODO finish all validations, description how long?
            'title' => 'required|max:255',
            'description' => 'max:255',
            'serves' =>  'max:255',
            'difficulty' => 'max:255',
            'prep_time' => 'required',
            'cook_time' => 'required'
        ];
    }
}


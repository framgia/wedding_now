<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDateMyTimeLineRequest extends FormRequest
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
        return [
            'id' => 'integer|required',
            'date' => 'date|required',
        ];

    }

    public function messages()
    {
        return [
            'id.integer' => trans('validation.integer'),
            'id.required' => trans('validation.required'),
            'date.required' => trans('validation.required'),
            'date.date' => trans('validation.date'),
        ];
    }
}

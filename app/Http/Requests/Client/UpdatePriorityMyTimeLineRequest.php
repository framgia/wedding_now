<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePriorityMyTimeLineRequest extends FormRequest
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
            'priority' => 'integer|in:0,1|integer',
            'id' => 'integer|required',
        ];
    }

    public function messages()
    {
        return [
            'id.integer' => trans('validation.integer'),
            'id.required' => trans('validation.required'),
            'priority.integer' => trans('validation.integer'),
            'priority.in' => trans('validation.in'),
            'priority.required' => trans('validation.required'),
        ];
    }
}

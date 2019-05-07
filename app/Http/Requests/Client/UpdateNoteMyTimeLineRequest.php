<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class UpdateNoteMyTimeLineRequest extends FormRequest
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
            'note' => 'string|nullable|max:100|required',
            'id' => 'integer|required',
        ];
    }

    public function messages()
    {
        return [
            'id.integer' => trans('validation.integer'),
            'id.required' => trans('validation.required'),
            'note.string' => trans('validation.string'),
            'note.max' => trans('validation.max'),
            'note.required' => trans('validation.required'),
        ];
    }
}

<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'title' => 'required|string|min:10|max:255',
            'contents' => 'required|min:50',
            'topic' => 'required|int',
            'tags' => 'required',
            'tags.*' => 'max:35|regex:/^[a-zA-Z0-9]+$/u',
        ];
    }
}

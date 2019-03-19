<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class DesignCardRequest extends FormRequest
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
            'arrData.*.card_id' => 'integer||nullable',
            'arrData.*.content' => 'required|string',
            'arrData.*.style' => 'required|string|',
            'arrData.*.metas' => 'array|required',
            'arrData.*.metas.*' => 'string',
        ];
    }
}

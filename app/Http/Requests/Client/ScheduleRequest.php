<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ScheduleRequest extends FormRequest
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
            'my_name' => 'required|string|max:30|min:0|string',
            'partner_name' => 'required|max:30|min:0|string',
            'venue' => 'required|string',
            'wedding_date' => 'required|date',
            'my_avatar' => 'max:2048|image|mimes:png,jpg,jpeg',
            'partner_avatar' => 'max:2048|image|mimes:png,jpg,jpeg',
        ];
    }
}

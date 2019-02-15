<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'gender' => 'required',
            'birthday' => 'required',
            'role' => 'required',
            'city' => 'required',
            'district' => 'required',
            'address' => 'required',
            'phone' => 'required|digits_between:9,11|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'user_name' => 'min:6|max:255|required',
            'password' => 'min:6|max:255|required',
            'password_confirmation' => 'same:password',
        ];
    }
}

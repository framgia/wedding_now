<?php

namespace App\Http\Requests;

use Auth;
use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
        $id = Auth::id();

        return [
            'name' => 'required|string|max:255',
            'gender' => 'required',
            'birthday' => 'required',
            'city' => 'required',
            'district' => 'required',
            'address' => 'required',
            'avatar_file' => 'mimes:jpeg,jpg,png|nullable',
            'phone' => 'required|digits_between:9,11|unique:users,phone,' . $id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'password' => 'min:6|max:255|nullable',
            'user_name' => 'min:6|max:255|required',
            'password_confirmation' => 'same:password',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => __('validation.required'),
            'name.string' => __('validation.string'),
            'name.max' => __('validation.max.string'),
            'gender.required' => __('validation.required'),
            'birthday.required' => __('validation.required'),
            'city.required' => __('validation.required'),
            'district.required' => __('validation.required'),
            'address.required' => __('validation.required'),
            'phone.required' => __('validation.required'),
            'phone.digits_between' => __('validation.digits_between'),
            'phone.unique' => __('validation.unique'),
            'email.required' => __('validation.required'),
            'email.string' => __('validation.string'),
            'email.email' => __('validation.email'),
            'email.max' => __('validation.max.numeric'),
            'email.unique' => __('validation.unique'),
            'password.min' => __('validation.min.string'),
            'password_confirmation.same' => __('validation.same'),
        ];
    }
}

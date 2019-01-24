<?php

namespace App\Http\Requests;

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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'gender' => 'required',
            'birthday' => 'required',
            'phone' => ['required', 'digits_between:9,11', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'user_name' => ['required', 'string', 'min:6', 'unique:users'],
            'password' => ['string', 'min:6', 'confirmed', 'nullable'],
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
            'phone.required' => __('validation.required'),
            'phone.digits_between' => __('validation.digits_between.phone'),
            'phone.unique' => __('validation.unique'),
            'email.required' => __('validation.required'),
            'email.string' => __('validation.string'),
            'email.email' => __('validation.email'),
            'email.max' => __('validation.max.numeric'),
            'email.unique' => __('validation.unique'),
            'password.unique' => __('validation.string'),
            'password.min' => __('validation.min.string'),
            'password.confirmed' => __('validation.confirmed'),
            'password_confirmation.same' => __('validation.same'),
        ];
    }
}

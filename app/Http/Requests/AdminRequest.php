<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
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
        if (isset($this->user_id)) {
            $id = $this->user_id;
        } else {
            $id = Auth::id();
        }

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
            'password_confirmation' => 'same:password',
        ];
    }
}

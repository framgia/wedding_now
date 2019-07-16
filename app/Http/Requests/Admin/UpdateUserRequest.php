<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Zizaco\Entrust\Entrust;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = Auth::user();

        if ($user->hasRole('admin') && $user->can('user-update')) {

            return true;
        }

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
            'roles' => 'required',
            'city' => 'required',
            'district' => 'required',
            'address' => 'required',
            'phone' => 'required|digits_between:9,11|unique:users,phone,' . $this->route('id'),
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->route('id'),
        ];
    }
}

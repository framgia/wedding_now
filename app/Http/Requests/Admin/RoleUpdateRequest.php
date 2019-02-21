<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RoleUpdateRequest extends FormRequest
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
        // roleId get from input hidden name=roleId
        return [
            'name' => 'required|unique:roles,name,' . $this->roleId,
            'display_name' => 'required|unique:roles,display_name,' . $this->roleId,
            'description' => 'nullable',
        ];
    }
}

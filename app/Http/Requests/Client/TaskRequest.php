<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
        if ($this->isMethod('POST')) {
            return $this->rulesCreateTask();
        } else {
            return $this->rulesUpdateTask();
        }
    }

    public function rulesCreateTask()
    {
        return [
            'name' => 'required|string',
            'category_id' => 'required|integer',
            'priority' => 'required|integer|min:0|max:1',
        ];
    }

    public function rulesUpdateTask()
    {
        return [
            'name' => 'required|string',
            'category_id' => 'required|integer',
            'priority' => 'required|integer|min:0|max:1',
        ];
    }
}

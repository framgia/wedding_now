<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SchedulaDefaultRequest extends FormRequest
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
            'info_schedule.name' => 'required',
            'info_schedule.budget' => 'required|min:0',
            'arr_tasks.*.name' => 'required',
            'arr_tasks.*.category_id' => 'required|integer',
            'arr_tasks.*.time_frame_id' => 'required|integer',
        ];
    }
}

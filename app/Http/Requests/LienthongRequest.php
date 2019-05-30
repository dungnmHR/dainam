<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LienthongRequest extends FormRequest
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
                'name' => 'required',
                'type' => 'required',
                'status' => 'required',
            ];
    }
    public function messages()
    {
        return [           
            'name.required' => 'Tên không được để trống.',
            'status.required' => 'Trạng thái không được để trống.',
            'type.required' => 'Loại hình không được để trống.',
        ];
    }
}

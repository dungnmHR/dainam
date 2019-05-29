<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Admin\Huyen;


class HuyenRequest extends FormRequest
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
                'code' => 'required',
                'name' => 'required',
                'tinh_id' => 'required',
                'status'   => 'required',
            ];
    }
    public function messages()
    {
        return [
            'code.required' => 'Mã số huyện không được để trống.',
            'name.required' => 'Tên không được để trống.',
            'status.required' => 'Trạng thái không được để trống.',
            'tinh_id.required' => 'Tỉnh thành không được để trống.',
        ];
    }
}

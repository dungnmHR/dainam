<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Admin\Tinh;

class TinhRequest extends FormRequest
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
        if ($this->method() == 'PATCH'){

            $id = $this->get('_id');
            $_tinh = Tinh::find($id);
            return [
                'code' => 'required|unique:tinhs,code,'.$_tinh->id.',id',
                'name' => 'required|unique:tinhs,name,'.$_tinh->id.',id',
                'status'   => 'required',
            ];
        }else{
            return [
                'code' => 'required|unique:tinhs',
                'name' => 'required|unique:tinhs',
                'status'   => 'required',
            ];
        }        
    }
    public function messages()
    {
        return [
            'code.required' => 'Mã số tỉnh không được để trống.',
            'code.unique' => 'Mã số tỉnh không được trùng.',
            'name.required' => 'Tên không được để trống.',
            'status.required' => 'Trạng thái không được để trống.',
            'name.unique' => 'Tên tỉnh không được trùng.',
        ];
    }
}

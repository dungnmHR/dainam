<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Admin\Nganhxt;

class NganhxtRequest extends FormRequest
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
            $_nxt = Nganhxt::find($id);
            return [
                'code' => 'required|unique:nganhxts,code,'.$_nxt->id.',id',
                'name'   => 'required',
                'tohopxt_id'   => 'required',
                'status'   => 'required',
            ];
        }else{
            return [
                'code' => 'required|unique:nganhxts',
                'name'   => 'required',
                'tohopxt_id'   => 'required',
                'status'   => 'required',
            ];
        }        
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên ngành không được để trống.',
            'tohopxt_id.required' => 'Tổ hợp xét tuyển không được để trống.',
            'code.required' => 'Mã số không được để trống.',
            'code.unique' => 'Mã số  không được trùng.',
            'status.required' => 'Trạng thái không được để trống.',
        ];
    }
}

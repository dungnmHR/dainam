<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Admin\Hocvienchinhquy;

class ChinhquyRequest extends FormRequest
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
            $_hv = Hocvienchinhquy::find($id);
            return [
                'mahv' => 'required|unique:hocvienchinhquies,mahv,'.$_hv->id.',id',
                'ten' => 'required',
                'sdt' => 'required',
                'status'   => 'required',
            ];
        }else{
            return [
                'mahv' => 'required|unique:hocvienchinhquies',
                'ten' => 'required',
                'sdt' => 'required',
                'status'   => 'required',
            ];
        }        
    }
    public function messages()
    {
        return [
            'mahv.required' => 'Mã học viên không được trùng.',
            'ten.required' => 'Tên học viên không được để trống.',
            'sdt.required' => 'Số điện thoại học viên không được để trống.',
            'status.required' => 'Trạng thái không được để trống.',
           
        ];
    }
}

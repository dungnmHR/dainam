<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Admin\Tohopxt;

class TohopxtRequest extends FormRequest
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
            $_thxt = Tohopxt::find($id);
            return [
                'code' => 'required|unique:tohopxts,code,'.$_thxt->id.',id',
                'status'   => 'required',
            ];
        }else{
            return [
                'code' => 'required|unique:tohopxts',
                'status'   => 'required',
            ];
        }        
    }
    public function messages()
    {
        return [
            'code.required' => 'Mã số không được để trống.',
            'code.unique' => 'Mã số  không được trùng.',
            'status.required' => 'Trạng thái không được để trống.',
        ];
    }
}

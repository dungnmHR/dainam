<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;

class UserRequest extends FormRequest
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
            $_user = User::find($id);
            return [
                'email' => 'required|unique:users,email,'.$_user->id.',id',
                'status'   => 'required',
            ];
        }else{
            return [
                'email' => 'required|unique:users',
                'password' => 'required',
                'status'   => 'required',
            ];
        }        
    }
    public function messages()
    {
        return [
            'email.required' => 'Email không được để trống.',
            'email.unique' => 'Email không được trùng.',
            'password.required' => 'Mật khẩu không được để trống.',
            'status.required' => 'Trạng thái không được để trống.',
        ];
    }
}

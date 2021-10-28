<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddUserRequest extends FormRequest
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
        return[
            'name'=>'unique:users,name',
            'email'=>'unique:users,email',
            'password' => 'required|min:8|max:15',

        ];
    }
    public function messages()
    {
        return[
            'name.unique'=>'Tên User đã tồn tại, vui lòng nhập một tên khác...',
            'email.unique'=>'Email đã tồn tại, vui lòng nhập một Email khác...',
            'password.min'=> 'Mật khẩu phải ít nhất 3 ký tự',
            'password.max'=> 'Mật khẩu chỉ được tối đa 15 ký tự',
        ];
    }
}

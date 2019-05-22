<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
            'uname'=>'required|regex:/^\w{6,12}$/',
            'upwd'=>'required|regex:/^\S{8,16}$/',
            'admin_email'=>'email',
            'reupwd'=>'same:password',
            'admin_phone'=>'required',
            'group'=>'required',
            'upic'=>'required',
        ];
    }

    public function messages()
    {
         return [
            'uname.required'=>'管理员账号不能为空',
            'uname.regex'=>'账号格式不正确',
            'upwd.required'=>'密码不能为空',
            'upwd.regex'=>'密码格式不正确',
            'reupwd.same'=>'两次输入密码不一致',
            'admin_phone.required'=>'手机号不能填写为空',
            'admin_phone.regex'=>'手机号格式不正确',
            'admin_email.email'=>'邮箱格式不正确',
            'upic.required'=>'请上传头像',
            'group.required'=>'请选择管理员权限',
        ];
    }
}

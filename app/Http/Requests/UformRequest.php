<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UformRequest extends FormRequest
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
            'user_name'=>'required|regex:/^\w{6,12}$/',
            'password'=>'required|regex:/^\S{8,16}$/',
            'user_email'=>'email',
            'pwd'=>'same:password',
            'user_phone'=>'required',
            'user_age'=>'required',
            'user_sex'=>'required',
            'user_pic'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'user_name.required'=>'用户名不能为空',
            'user_name.regex'=>'用户名格式不正确',
            'password.required'=>'密码不能为空',
            'password.regex'=>'密码格式不正确',
            'pwd.same'=>'两次输入密码不一致',
            'user_phone.required'=>'手机号不能填写为空',
            'user_phone.regex'=>'手机号格式不正确',
            'user_email.email'=>'邮箱格式不正确',
            'user_age.required'=>'年龄不能为空',
            'user_sex.required'=>'性别不能为空',
            'user_pic.required'=>'请上传头像',
        ];
    }
}

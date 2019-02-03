<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class validateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;    //设置为true，这里是验证授权，我们没设置，所以设置为true 通过就行
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required', 
            'body' => 'required',
        ];
    }
    /**
     * 获取被定义验证规则的错误消息
     *
     * @return array
     * @translator laravelacademy.org
     */
    public function messages(){     //在这里可重写错误显示的信息
        return [
            'title.required' => '你必须填写标题',  //中文无法识别？？？
            'body.required'  => '你必须填写body',
        ];
    }
}

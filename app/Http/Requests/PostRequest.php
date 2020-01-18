<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
        return [//vaildateのルールを記載
            'user_id' => 'required|numeric',//数字、必須項目
            'pet_id' => 'required|numeric',//数字、必須項目
            'term_start' => 'required|date',//必須項目　data型じゃなきゃダメ 
            'term_end' => 'required|date',//必須項目　data型じゃなきゃダメ 
            'price' => 'required|numeric',//数字、必須項目
            'content' => 'required',//bodyも必須項目
            'completed' => 'required|numeric',//数字、必須項目
        ];
    }
}

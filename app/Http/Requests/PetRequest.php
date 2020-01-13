<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PetRequest extends FormRequest
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
            'name' => 'required',//必須項目
            'pettype_id' => 'required',//1つは必須項目
            'image' => 'required|file|image',//画像、ファイル
            'gender' => 'required',//必須項目 
            'characteristic' => 'required',//必須項目
        ];
    }
}

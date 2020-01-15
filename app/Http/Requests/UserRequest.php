<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Http\Request;

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
    public function rules(Request $request)
    {
        
        // dd($request);

        // if($request->email == null){
            if(!isset($request->email_update)){//自己紹介編集時のバリデーション

            return [//vaildateのルールを記載
                'user_id' => 'required|numeric',//数字、必須項目
                'name' => 'required',//必須項目
                'image' => 'file|image',//画像、ファイル
                'host_experience' => 'required',//必須項目 
                // 'pettypes[]' => 'required',//1つは必須項目
                'area' => 'required',//必須項目
            ];

        } else {//メルアド変更時のバリデーション

            return [//vaildateのルールを記載
                'user_id' => 'required|numeric',//数字、必須項目
                'email' => 'required',//必須項目                
            ];
        }
            }
}

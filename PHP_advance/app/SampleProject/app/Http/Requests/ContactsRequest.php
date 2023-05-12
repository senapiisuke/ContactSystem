<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactsRequest extends FormRequest
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
            //バリデーション
            'name' => 'required | max:10',
            'kana' => 'required | max:10',
            //'tell' => 'required',
            'email' => 'required',
            'body' => 'required',
        ];
    }

    public function attributes()
    {
        return [
            'name' => '氏名',
            'kana' => 'フリガナ',
            'tell' => '電話番号',
            'email' => 'メールアドレス',
            'body' => 'お問合せ内容',
        ];
    }

    public function messages() {
        return [
            //エラーメッセージ
            'name.required' => ':attributeは必須項目です。',
            'name.max' => ':attributeは:max字以内で入力してください。',
            'kana.required' => ':attributeは必須項目です。',
            'kana.max' => ':attributeは:max字以内で入力してください。',
            'email.required' => ':attributeは必須項目です。',
            'body.required' => ':attributeは必須項目です。',
        ];
    }

}

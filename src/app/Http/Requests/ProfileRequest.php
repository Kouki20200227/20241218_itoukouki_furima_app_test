<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
            'profile_image' => 'required',
            'profile_user_name' => 'required',
            'profile_address' => 'required',
            'profile_post_card' => 'required',
            'profile_building' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'profile_image.required' => 'プロフィール画像を選択してください',
            'profile_user_name.required' => 'ユーザー名を入力してください',
            'profile_address.required' => '住所を入力してください',
            'profile_post_code.required' => '郵便番号を入力してください',
            'profile_building.required' => '建物名を入力してください',
        ];
    }
}

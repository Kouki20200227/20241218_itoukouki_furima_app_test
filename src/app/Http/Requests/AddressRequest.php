<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'purchase_post_code' => 'required',
            'purchase_address' => 'required',
            'purchase_building' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'purchase_post_code.required' => '郵便番号の入力は必須です',
            'purchase_address.required' => '住所の入力は必須です',
            'purchase_building.required' => '建物名の入力は必須です',
        ];
    }
}

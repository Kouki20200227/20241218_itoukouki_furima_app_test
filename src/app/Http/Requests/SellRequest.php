<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SellRequest extends FormRequest
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
            'condition_id' => 'required',
            'item_image' => 'required',
            'item_detail' => 'required',
            'item_price' => 'required',
        ];
    }

    public function messages(){
        return [
            'condition_id.required' => '状態を選択してください',
            'item_image.required' => '商品画像を選択してください',
            'item_detail.required' => '商品説明を入力してください',
            'item_price.required' => '商品価格を入力してください',
        ];
    }
}

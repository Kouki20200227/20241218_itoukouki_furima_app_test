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
            'item_image' => 'required|file|mimes:jpeg|max:2048',
            'categories' => ['required'],
            'condition' => 'required',
            'item_name' => 'required',
            'item_detail' => 'required|max:255',
            'item_price' => 'required|min:0',
        ];
    }

    public function messages(){
        return [
            'item_image.required' => '商品画像を選択してください',
            'item_image.max' => '画像は2M以内にしてください',
            'categories.required' => '１つ以上のカテゴリーを選択してください',
            'condition.required' => '状態を選択してください',
            'item_name.required' => '商品名を入力してください',
            'item_detail.required' => '商品の説明を入力してください',
            'item_detail.max' => '文字数を255文字以内にしてください',
            'item_price.required' => '販売価格を入力してください',
            'item_price.min' => '販売価格を0円以上にしてください',
        ];
    }
}

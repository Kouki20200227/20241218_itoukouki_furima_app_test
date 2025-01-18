<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Profile;
use App\Models\Purchase;
use Faker\Provider\ar_EG\Address;
use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    // 商品購入画面処理
    public function purchase_index($item_id, Request $request){
        $item = Item::find($item_id);
        $profile = Profile::where('user_id', Auth::id())->first();
        return view('purchase', ['item' => $item, 'profile' => $profile]);
    }

    public function purchase_store(Request $request){
        // バリデーション
        $validated = $request->validate([
            'payment_method' => 'filled',
        ],
    [
        'payment_method.filled' => '支払い方法を選択してください',
    ]);

        $form = $this->setData($request);
        Purchase::create($form); //購入情報登録
        Item::find($request->item_id)->update(['item_buy_flg' => '1',]); //出品情報更新

        return redirect('/');
    }

    // 配送先変更画面処理
    public function address_index($item_id){
        $param = [
            'item_id' => $item_id,
        ];
        return view('address', $param);
    }
    public function address_store(AddressRequest $request){
        session()->put('post_code', $request->purchase_post_code);
        session()->put('address', $request->purchase_address);
        session()->put('building', $request->purchase_building);
        return redirect('/purchase/' . $request->item_id);
    }



    // 商品購入情報セット処理
    private function setData($request){
        $form = [
            'user_id' => Auth::id(),
            'item_id' => $request->item_id,
            'purchase_price' => $request->item_price,
            'purchase_payment_method' => $request->payment_method,
            'purchase_address' => $request->address,
            'purchase_post_code' => $request->post_code,
            'purchase_building' => $request->building,
        ];

        return $form;
    }
}

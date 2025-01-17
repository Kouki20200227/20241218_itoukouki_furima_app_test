<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddressRequest;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Profile;
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
        $item = Item::find($request);
        return view('address', ['item' => $item]);
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
}

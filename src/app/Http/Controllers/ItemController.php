<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SellRequest;
use App\Models\Item;
use App\Models\Category;
use App\Models\Condition;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    // 商品出品画面表示処理
    public function sell_index(){
        $categories = Category::all();
        $conditions = Condition::all();

        return view('sell', ['categories' => $categories, 'conditions' => $conditions]);
    }
    // 商品出品画面登録処理
    public function sell_store(SellRequest $request){
        // 選択画像セット
        $image = $request->file('item_image')->getClientOriginalName();
        $path = 'storage/item_img/' . $image;
        if(!Storage::exists($image)){
            $request->file('item_img')->storeAs('public/item_img', $image);
        }
        // 商品登録処理
        $form = $this->itemSet($request, $path);
        $result = Item::create($form);
        // カテゴリー登録処理
        Item::find($result->id)->categories()->syncWithoutDetaching($request->categories);

        return redirect('/');
    }

    // 商品詳細画面表示処理
    public function item_index($item_id){
        // 出品物照会処理
        $item = Item::where('id', $item_id)->with('categories', 'comments', 'condition')->withCount('favorites', 'comments')->first();

        return view('item', ['item' => $item,]);
    }

    private function itemSet($request, $path){
        $form = [
            'user_id' => Auth::id(),
            'condition_id' => $request->condition,
            'item_image' => $path,
            'item_name' => $request->item_name,
            'item_detail' => $request->item_detail,
            'item_price' => $request->item_price,
        ];

        return $form;
    }
}

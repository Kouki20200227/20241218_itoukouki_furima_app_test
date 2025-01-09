<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function item_index($item_id){
        // 出品物照会処理
        $item = Item::where('id', $item_id)->with('categories', 'comments', 'condition')->withCount('favorites', 'comments')->first();

        return view('item', ['item' => $item,]);
    }
}

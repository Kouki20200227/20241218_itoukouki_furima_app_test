<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Favorite;

class ItemController extends Controller
{
    public function item_index(Request $request){
        // 出品物照会処理
        $item = Item::with('categories', 'comments', 'condition')->withCount('favorites', 'comments')->find($request)->first();
        return view('item', ['item' => $item,]);
    }
}

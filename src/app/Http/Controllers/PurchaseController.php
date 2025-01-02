<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\Item;

class PurchaseController extends Controller
{
    public function purchase_index(Request $request){
        $item = Item::find($request);
        $favorite_count = Favorite::where([
            ['item_id', '=', $request],
        ])->count();
        dd($favorite_count);
        return view('item', ['item' => $item]);
    }

    public function purchase_store(Request $request){
        $item = Item::find($request);
        return view('address', ['item' => $item]);
    }
}

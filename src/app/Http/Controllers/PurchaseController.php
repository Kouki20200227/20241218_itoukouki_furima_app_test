<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Models\Item;

class PurchaseController extends Controller
{
    public function purchase_index(Request $request){
        return view('purchase');
    }

    public function purchase_store(Request $request){
        $item = Item::find($request);
        return view('address', ['item' => $item]);
    }
}

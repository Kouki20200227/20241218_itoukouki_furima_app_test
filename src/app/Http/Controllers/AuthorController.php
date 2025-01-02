<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;
use App\Http\Requests\ProfileRequest;
use App\Models\Item;
use Illuminate\Support\Facades\Auth;


class AuthorController extends Controller
{
    // ログイン済みトップページ表示処理
    public function user_index(){
        $items = Item::all();
        return view('index', ['items' => $items]);
    }

    // ログイン済みお気に入りページ表示処理
    public function user_index_mylist(){
        return view('index');
    }

    // 未承認ユーザートップページ
    public function index(){
        $items = Item::all();
        return view('index', ['items' => $items]);
    }
}

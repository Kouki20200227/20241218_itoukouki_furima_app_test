<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // トップページ表示処理
    public function index(){
        return view('index');
    }

    // プロフィールページ表示処理
    public function mypage(){
        return view('mypage');
    }
    
    // プロフィール設定ページ表示処理
    public function profile(){
        return view('profile');
    }

    // 商品出品ページ表示処理
    public function sell(){
        return view('sell');
    }

    // 商品詳細ページ表示
    public function item(){
        return view('item');
    }
}

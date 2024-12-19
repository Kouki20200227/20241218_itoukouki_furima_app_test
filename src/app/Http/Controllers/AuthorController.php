<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // トップページ表示処理
    public function index(){
        return view('index');
    }

    // プロフィール設定ページ表示処理
    public function profile(){
        return view('profile');
    }
}

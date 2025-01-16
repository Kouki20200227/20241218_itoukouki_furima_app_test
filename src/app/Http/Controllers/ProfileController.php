<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Http\Requests\ProfileRequest;
use App\Models\Item;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // プロフィール画面表示処理
    public function mypage_index(Request $request){
        $profile = Profile::where('user_id', Auth::id())->first();

        if($request->tab === 'sell'){
            $items = Item::where('user_id', Auth::id())->get();
        }elseif($request->tab === 'buy'){
            $items = Purchase::where('user_id', Auth::id())->get();
        }

        return view('mypage', ['profile' => $profile, 'items' => $items]);
    }

    // プロフィール編集画面表示処理
    public function profile_index()
    {
        $user_id = Auth::id();

        $query = Profile::query();
        $profile = $this->getSearchQuery($user_id, $query)->first();

        return view('profile', ['profile' => $profile]);
    }

    // プロフィール編集画面登録処理
    public function profile_store(ProfileRequest $request)
    {
        // イメージ取得
        $image = $request->file('profile_image')->getClientOriginalName();
        // 画像存在チェック
        if(!Storage::exists($image)){
            $request->file('profile_image')->storeAs('public/profile_img', $image);
        }
        $path = 'storage/profile_img/' . $image;

        // データセット
        $form = $this->setData($request, $path);

        // 登録処理
        Profile::create($form);

        return redirect('/');
    }

    // プロフィール編集画面更新処理
    public function profile_update(ProfileRequest $request){
        // データ取得
        $query = Profile::query();
        $profile = $this->getSearchQuery(Auth::id(), $query)->first();

        // イメージパス取得
        if(isset($request->profile_image)){
            $image = $request->file('profile_image')->getClientOriginalName();
            $request->file('profile_image')->storeAs('public/profile_img', $image);
            $path = 'storage/profile_img/' . $image;
        }else{
            $path = $profile->profile_image;
        }

        // データセット
        $form = $this->setData($request, $path);
        Profile::find($profile->id)->update($form);

        return redirect('/');
    }



    // プロフィール登録済みチェック
    private function getSearchQuery($request, $query){
        $query->where('user_id', '=', $request);

        return $query;
    }

    // データセット
    private function setData($request, $path){
        $form = [
            'user_id' => Auth::id(),
            'profile_image' => $path,
            'profile_user_name' => $request->profile_user_name,
            'profile_address' => $request->profile_address,
            'profile_post_code' => $request->profile_post_code,
            'profile_building' => $request->profile_building,
        ];

        return $form;
    }
}
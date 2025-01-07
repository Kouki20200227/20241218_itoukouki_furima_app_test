<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    // プロフィール画面表示処理
    public function profile_index()
    {
        $user_id = Auth::id();

        $query = Profile::query();
        $profile = $this->getSearchQuery($user_id, $query)->first();

        return view('profile', ['profile' => $profile]);
    }

    // プロフィール画面登録・更新処理
    public function profile_store(ProfileRequest $request)
    {
        // 画像ファイル存在チェック
        $image = $request->file('profile_image')->getClientOriginalName();
        if(Storage::exists('public/profile_img' . $image)){
            $path = 'public/profile_img/' . $image;
        }else{
        $path = $request->file('profile_image')->store('public/profile_img');
        }

        // 画像ファイル保存処理
        $form = [
            'user_id' => Auth::id(),
            'profile_image' => $path,
            'profile_user_name' => $request->profile_user_name,
            'profile_address' => $request->profile_address,
            'profile_post_card' => $request->profile_post_code,
            'profile_building' => $request->profile_building,
        ];
        // トークンまだ外していない
        if(isEmptyString($request->profile_id)){
            Profile::create($form);
        }else{
            Profile::find($request->profile_id)->update();
        }

        return redirect('/mypage/profile');
    }






    // プロフィール登録済みチェック
    private function getSearchQuery($request, $query){
        $query->where('user_id', '=', $request);

        return $query;
    }
}
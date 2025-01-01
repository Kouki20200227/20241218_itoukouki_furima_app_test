<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Auth;


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
        $form = [
            'user_id' => Auth::id(),
            'profile_image' => $request->profile_image,
            'profile_user_name' => $request->profile_user_name,
            'profile_address' => $request->profile_address,
            'profile_post_card' => $request->profile_post_code,
            'profile_building' => $request->profile_building,
        ];

        if(Profile::find(Auth::id())){
            Profile::find(Auth::id())->update($form);
        }else{
            Profile::create($form);
        }

        return redirect('/mypage/profile');
    }

    // プロフィール登録済みチェック
    private function getSearchQuery($request, $query){
        $query->where('user_id', '=', $request);

        return $query;
    }
}
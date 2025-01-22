<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddressRequest;
use App\Http\Requests\SellRequest;
use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use App\Models\Item;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Favorite;
use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\MockObject\ClassIsFinalException;

use function PHPUnit\Framework\isNull;

class AuthorController extends Controller
{
    // ログイン済みトップページ表示処理
    public function user_index(Request $request){
        $query = $request->query('page', null);
        if(is_null($query)){
            if($request->has('keyword')){
                $items = $this->search_Index($request->keyword);
            }else{
                $items = Item::all();
            }
        }elseif($query === 'mylist'){
            if($request->has('keyword')){
                $items = $this->search_Index($request->keyword)->whereHas('favorites', function ($query) {
                    $query->where('user_id', Auth::id());
                })->get();
            }else{
                $items = Item::whereHas('favorites',    function ($query) {
                    $query->where('user_id', Auth::id());
                })->get();
            }
        }
        return view('index', compact('items'));
    }

    private function search_Index($keyword){
        $result = Item::where('item_name', 'LIKE', "%{$keyword}%")->get();

        return $result;
    }

    // 商品出品画面表示処理
    public function sell_index(){
        $categories = Category::all();
        $conditions = Condition::all();

        return view('sell', ['categories' => $categories, 'conditions' => $conditions]);
    }
    // 商品出品画面登録処理
    public function sell_store(SellRequest $request){
        // 選択画像セット
        $image = $request->file('item_image')->getClientOriginalName();
        $path = 'storage/item_img/' . $image;
        if(!Storage::exists($image)){
            $request->file('item_img')->storeAs('public/item_img', $image);
        }
        // 商品登録処理
        $form = $this->itemSet($request, $path);
        $result = Item::create($form);
        // カテゴリー登録処理
        Item::find($result->id)->categories()->syncWithoutDetaching($request->categories);

        return redirect('/');
    }
    // 商品データセット処理
    private function itemSet($request, $path){
        $form = [
            'user_id' => Auth::id(),
            'condition_id' => $request->condition,
            'item_image' => $path,
            'item_name' => $request->item_name,
            'item_detail' => $request->item_detail,
            'item_price' => $request->item_price,
        ];

        return $form;
    }



    // 商品詳細画面表示処理
    public function item_index($item_id){
        // 出品物照会処理
        $item = Item::where('id', $item_id)->with('categories', 'comments', 'condition')->withCount('favorites', 'comments')->first();

        return view('item', ['item' => $item,]);
    }
    public function item_store($item_id, Request $request){
        if(isset($_POST['favorite_btn'])){
            $this->favoriteStore($item_id);
            return redirect(route('item.index', ['item_id' => $item_id]));
        }elseif(isset($_POST['comment_btn'])){
            $this->commentStore($item_id, $request);
            return redirect(route('item.index', ['item_id' => $item_id]));
        }
    }
    // お気に入り追加処理
    private function favoriteStore($item_id){
        // 存在チェック
        $check = Favorite::where('user_id', Auth::id())->orWhere('item_id', $item_id)->first();
        if(is_null($check)){
            $check2 = Favorite::onlyTrashed()->where('user_id', Auth::id())->orWhere('item_id', $item_id)->first();
            if(is_null($check2)){
                Favorite::create([
                    'user_id' => Auth::id(),
                    'item_id' => $item_id,
                ]);
            }else{
                $check2->restore();
            }
        }else{
            Favorite::find($check->id)->delete();
        }
    }
    // コメント登録処理
    private function commentStore($item_id, $request){
        $profile = Profile::where('user_id', Auth::id())->first(['id']);
        dd($profile->id);
        Comment::create([
            'profile_id' => $profile->id,
            'item_id' => $item_id,
            'comment' => $request->comment,
        ]);
    }

    // プロフィール画面表示処理
    public function mypage_index(Request $request){
        $profile = Profile::where('user_id', Auth::id())->first();
        $tab = $request->tab;

        if($request->tab === 'sell'){
            $items = Item::where('user_id', Auth::id())->get();
            return view('mypage', ['profile' => $profile, 'items' => $items, 'tab' => $tab]);
        }elseif($request->tab === 'buy'){
            $purchases = Purchase::where('user_id', Auth::id())->with('item')->get();
            return view('mypage', ['profile' => $profile, 'items' => $purchases, 'tab' => $tab]);
        }
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

        // プロフィールデータセット
        $form = $this->setProfileData($request, $path);
        Profile::find($profile->id)->update($form);

        return redirect('/');
    }


    // 商品購入画面処理
    public function purchase_index($item_id, Request $request){
        $item = Item::find($item_id);
        $profile = Profile::where('user_id', Auth::id())->first();
        return view('purchase', ['item' => $item, 'profile' => $profile]);
    }

    public function purchase_store(Request $request){
        // バリデーション
        $validated = $request->validate([
            'payment_method' => 'filled',
        ],
    [
        'payment_method.filled' => '支払い方法を選択してください',
    ]);

        $form = $this->setPurchaseData($request);
        Purchase::create($form); //購入情報登録
        Item::find($request->item_id)->update(['item_buy_flg' => '1',]); //出品情報更新

        return redirect('/');
    }

    // 配送先変更画面処理
    public function address_index($item_id){
        $param = [
            'item_id' => $item_id,
        ];
        return view('address', $param);
    }
    public function address_store(AddressRequest $request){
        session()->put('post_code', $request->purchase_post_code);
        session()->put('address', $request->purchase_address);
        session()->put('building', $request->purchase_building);
        return redirect('/purchase/' . $request->item_id);
    }



    // 商品購入情報セット処理
    private function setPurchaseData($request){
        $form = [
            'user_id' => Auth::id(),
            'item_id' => $request->item_id,
            'purchase_price' => $request->item_price,
            'purchase_payment_method' => $request->payment_method,
            'purchase_address' => $request->address,
            'purchase_post_code' => $request->post_code,
            'purchase_building' => $request->building,
        ];

        return $form;
    }
    // プロフィール登録済みチェック
    private function getSearchQuery($request, $query){
        $query->where('user_id', '=', $request);

        return $query;
    }
    // プロフィールデータセット
    private function setProfileData($request, $path){
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

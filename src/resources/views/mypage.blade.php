@extends('layouts.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/mypage.css')}}">
@endsection

@section('content')
<div class="mypage__content">
    <form action="/mypage/profile" class="profile__form" method="get">
        @csrf
        <!-- プロフィール画像・ユーザー名 -->
        <div class="profile__group">
            <img src="#" alt="" class="profile__group--img">
            <strong class="profile__group--user">ユーザー名</strong>
        </div>
        <!-- プロフィール編集ボタン -->
        <div class="profile__button">
            <button class="profile__button--submit" type="submit">プロフィールを編集</button>
        </div>
    </form>
    <!-- 出品・購入リスト表示 -->
    <form action="/mypage" class="item__form" method="get">
        @csrf
        <div class="item__ttl">
            <div class="item__button">
                <button class="item__button--submit" type="submit" name="sell">出品した商品</button>
                <button class="item__button--submit" type="submit" name="item">購入した商品</button>
            </div>
        </div>
        <div class="item__output">
            <div class="output__items">
                <img src="#" alt="商品画像" class="output__items--img">
                <label class="output__items--lbl">商品名</label>
            </div>
            <div class="output__items">
                <img src="#" alt="商品画像" class="output__items--img">
                <label class="output__items--lbl">商品名</label>
            </div>
            <div class="output__items">
                <img src="#" alt="商品画像" class="output__items--img">
                <label class="output__items--lbl">商品名</label>
            </div>
            <div class="output__items">
                <img src="#" alt="商品画像" class="output__items--img">
                <label class="output__items--lbl">商品名</label>
            </div>
            <div class="output__items">
                <img src="#" alt="商品画像" class="output__items--img">
                <label class="output__items--lbl">商品名</label>
            </div>
        </div>
    </form>
</div>
@endsection
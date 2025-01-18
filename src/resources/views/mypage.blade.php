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
            <img src="{{asset($profile->profile_image)}}" class="profile__group--img">
            <strong class="profile__group--user">{{$profile->profile_user_name}}</strong>
        </div>
        <!-- プロフィール編集ボタン -->
        <div class="profile__button">
            <button class="profile__button--submit" type="submit">プロフィールを編集</button>
        </div>
    </form>
    <!-- 出品・購入リスト表示 -->
    <div class="item__group">
        <div class="item__ttl">
            <div class="item__tag">
                <script src="{{asset('js/mypage.js')}}"></script>
                <a class="item__tag--link" id="sell" href="/mypage?tab=sell" onchange="clickEventSell()">出品した商品</a>
                <a class="item__tag--link" id="buy" href="/mypage?tab=buy" onchange="clickEventBuy()">購入した商品</a>
            </div>
        </div>
        <div class="item__output">
            @if (!$items->isEmpty())
                @foreach ($items as $item)
                    <div class="output__item">
                        <img src="{{asset($item->item_image)}}" class="output__item--img">
                        <label class="output__item--lbl">{{$item->item_name}}</label>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection
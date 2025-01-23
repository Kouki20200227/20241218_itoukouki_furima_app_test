@extends('layouts.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/mypage.css')}}">
@endsection

@section('content')
<div class="mypage__content">
    <div class="profile__group">
        <!-- プロフィール画像・ユーザー名 -->
        <div class="profile__tag">
            <img src="{{asset($profile->profile_image)}}" class="profile__tag--img">
            <strong class="profile__tag--user">{{$profile->profile_user_name}}</strong>
        </div>
        <!-- プロフィール編集ボタン -->
        <div class="profile__btn">
            <a href="/mypage/profile" class="profile__btn--link">プロフィールを編集</a>
        </div>
    </div>
    <!-- 出品・購入リスト表示 -->
    <div class="item__group">
        <div class="item__ttl">
            <div class="item__tag">
                <script src="{{asset('js/mypage.js')}}"></script>
                <a class="item__tag--link" id="sell" href="/mypage?tab=sell">出品した商品</a>
                <a class="item__tag--link" id="buy" href="/mypage?tab=buy">購入した商品</a>
            </div>
        </div>
        <div class="item__output">
            @if (!$items->isEmpty())
                @if ($tab === 'sell')
                    @foreach ($items as $item)
                        <div class="output__item">
                            <img src="{{asset($item->item_image)}}" class="output__item--img">
                            <label class="output__item--lbl">{{$item->item_name}}</label>
                        </div>
                    @endforeach
                @elseif($tab === 'buy')
                    @foreach ($items as $item)
                        <div class="output__item">
                            <img src="{{asset($item->item->item_image)}}" class="output__item--img">
                            <label class="output__item--lbl">{{$item->item->item_name}}</label>
                        </div>
                    @endforeach
                @endif
            @endif
        </div>
    </div>
</div>
<script src="{{asset('js/mypage.js')}}"></script>
@endsection
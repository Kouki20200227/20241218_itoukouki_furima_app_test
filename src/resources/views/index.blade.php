@extends('layouts.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<script src="{{asset('js/profile.js')}}"></script>
<div class="index__content">
    <!-- おすすめ・マイリスト選択ボタン -->
    <div class="list__bar">
        <div class="index__group">
            <div class="index__tag">
                <a href="/" class="index__tag--link" id="left">おすすめ</a>
            </div>
            @if (Auth::check())
                <div class="index__tag">
                    <a href="/?page=mylist" class="index__tag--link" id="right">マイリスト</a>
                </div>
            @endif
        </div>
    </div>
    <!-- 出品リスト表示 -->
    <div class="item__list">
        @foreach ($items as $item)
        @if (!Auth::check())
        <div class="item__group">
            <div class="item__pic">
                @if ($item->item_buy_flg === 1)
                    <img src="{{asset($item->item_image)}}" alt="商品画像" class="item__group--img sold">
                    <p class="item__group--sold">sold</p>
                @else
                    <a href="/item/{{$item->id}}" class="item__group--link"><img src="{{asset($item->item_image)}}" alt="商品画像" class="item__group--img"></a>
                @endif
            </div>
            <p class="item__group--name">{{$item->item_name}}</p>
        </div>
        @elseif (Auth::id() !== $item->user_id)
        <div class="item__group">
            <div class="item__pic">
                @if ($item->item_buy_flg === 1)
                    <img src="{{asset($item->item_image)}}" alt="商品画像" class="item__group--img sold">
                    <p class="item__group--sold">sold</p>
                @else
                    <a href="/item/{{$item->id}}" class="item__group--link"><img src="{{asset($item->item_image)}}" alt="商品画像" class="item__group--img"></a>
                @endif
            </div>
            <p class="item__group--name">{{$item->item_name}}</p>
        </div>
        @endif
        @endforeach
    </div>
</div>
<script src="{{asset('js/index.js')}}"></script>
@endsection
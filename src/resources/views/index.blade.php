@extends('layouts.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
<script src="{{asset('js/profile.js')}}"></script>
<div class="index__content">
    <!-- おすすめ・マイリスト選択ボタン -->
    <div class="list__bar">
        <form action="/" class="index__form" method="get">
            @csrf
            <div class="button__group">
                <button class="button__group--submit" type="submit" name="all">おすすめ</button>
            </div>
            <div class="button__group">
                <button class="button__group--submit" type="submit" name="mylist">マイリスト</button>
            </div>
        </form>
    </div>
    <!-- 出品リスト表示 -->
    <div class="item__list">
        @foreach ($items as $item)
        @if (!Auth::check())
        <div class="item__group">
            <div class="item__pic">
                @if ($item->item_buy_flg === 1)
                    <img src="{{asset($item->item_image)}}" alt="商品画像" class="item__group--img sold">
                    <p class="item__group--sold">SoldOut</p>
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
                    <p class="item__group--sold">SoldOut</p>
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
@endsection
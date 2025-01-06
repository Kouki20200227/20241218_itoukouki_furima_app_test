@extends('layouts.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/index.css')}}">
@endsection

@section('content')
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
                <a href="/item/?item_id={{$item->id}}" class="item__group--link"><img src="{{$item->item_image}}" alt="商品画像" class="item__group--img"></a>
            </div>
            <p class="item__group--name">{{$item->item_name}}</p>
        </div>
        @elseif (Auth::id() !== $item->user_id)
        <div class="item__group">
            <div class="item__pic">
                <a href="/item/?item_id={{$item->id}}" class="item__group--list"><img src="{{$item->item_image}}" alt="商品画像" class="item__group--img"></a>
            </div>
            <p class="item__group--name">{{$item->item_name}}</p>
        </div>
        @endif
        @endforeach
    </div>
</div>
@endsection
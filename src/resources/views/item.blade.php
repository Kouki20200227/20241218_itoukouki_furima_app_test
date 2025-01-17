@extends('layouts.app')

@section('link')
<link rel="stylesheet" href="{{asset('css/item.css')}}">
@endsection

@section('content')
<div class="item__content">
    <!-- 商品画像 -->
    <div class="img__group">
        <div class="img__pic">
            <img src="{{asset($item->item_image)}}" alt="商品画像" class="img__group--item">
        </div>
    </div>
    <!-- 商品詳細一覧 -->
    <div class="detail__group">
        <!-- 購入手続きフォーム -->
        <form action="/purchase/{{$item->id}}" class="buy__form" method="get">
            @csrf
            <h2 class="buy__form--ttl">{{$item->item_name}}</h2>
            <small class="buy__form--subttl">ブランド名</small>
            <p class="buy__form--price"><span class="mini">¥</span>{{number_format($item->item_price)}}<span class="mini">(税込)</span></p>
            <div class="buy__group">
                <!-- お気に入り数 -->
                <div class="buy__items">
                    <p class="buy__items--txt">☆</p>
                    <small class="buy__items--count">{{$item->favorites_count}}</small>
                </div>
                <!-- コメント数 -->
                <div class="buy__items">
                    <p class="buy__items--txt">⚪︎</p>
                    <small class="buy__items--count">{{$item->comments_count}}</small>
                </div>
            </div>
            <div class="buy__button">
                <button class="buy__button--submit" type="submit">購入手続きへ</button>
            </div>
        </form>
        <!-- 商品説明コンテンツ -->
        <div class="explanation__content">
            <!-- 商品説明グループ -->
            <p class="explanation__content--ttl">商品説明</p>
            <div class="explanation__group">
                <p class="explanation__group--txt">{{$item->item_detail}}</p>
            </div>
            <!-- 商品の情報グループ -->
            <p class="explanation__content--ttl">商品の情報</p>
            <div class="explanation__group">
                <div class="explanation__tag">
                    <p class="explanation__tag--ttl">カテゴリー</p>

                    <div class="explanation__item">
                        @foreach ($item->categories as $category)
                        <p class="explanation__item--category">{{$category->content}}</p>
                        @endforeach
                    </div>
                </div>
                <div class="explanation__tag">
                    <p class="explanation__tag--ttl">商品の状態</p>
                    <div class="explanation__item">
                        <p class="explanation__item--condition">{{$item->condition->condition}}</p>
                    </div>
                </div>
            </div>
        </div>
            <!-- コメントグループ -->
            <div class="comment__group">
                <p class="comment__group--ttl">コメント(1)</p>
                <div class="comment-user__tag">
                    <img src="#" alt="?" class="comment-user__tag--img">
                    <p class="comment-user__tag--name">admin</p>
                </div>
                <div class="user-comment--tag">
                    <label class="user-comment--tag">こちらにコメントが入ります。</label>
                </div>
                <div class="comment__area">
                    <p class="comment__area--ttl">商品へのコメント</p>
                    <form action="/item" class="comment__form" method="post">
                        @csrf
                        <div class="input__group">
                            <textarea name="comment" class="input__group--txt"></textarea>
                        </div>
                        <div class="button__group">
                            <button class="button__group--submit" type="submit">コメントを送信する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
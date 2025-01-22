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
        <div class="item__group">
            <h2 class="item__group--ttl">{{$item->item_name}}</h2>
            <small class="item__group--subttl">ブランド名</small>
            <p class="item__group--price"><span class="mini">¥</span>{{number_format($item->item_price)}}<span class="mini">(税込)</span></p>
            <div class="item__tag">
                <!-- お気に入り数 -->
                <form action="/item/{{$item->id}}" class="item__items" type="submit" method="post">
                    @csrf
                        <button class="item__items--txt" type="submit" name="favorite_btn">☆</button><br/>
                        <small class="item__items--count">{{$item->favorites_count}}</small>
                </form>
                <!-- コメント数 -->
                <div class="item__items">
                    <p class="item__items--txt">⚪︎</p>
                    <small class="item__items--count">{{$item->comments_count}}</small>
                </div>
            </div>
            <div class="buy__group">
                <a href="/purchase/{{$item->id}}" class="buy__group--link">購入手続きへ</a>
            </div>
        </div>
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
                <p class="comment__group--ttl">コメント({{$item->comments_count}})</p>
                @if (!$item->comments->isEmpty())
                    @foreach ($item->comments as $comment)
                        <div class="comment-user__tag">
                            <img src="{{asset($comment->profile->profile_image)}}" class="comment-user__tag--img">
                            <p class="comment-user__tag--name">{{$comment->profile->profile_user_name}}</p>
                        </div>
                        <div class="user-comment--tag">
                            <label class="user-comment--tag">{{$comment->comment}}</label>
                        </div>
                    @endforeach
                @endif
                <div class="comment__area">
                    <p class="comment__area--ttl">商品へのコメント</p>
                    <form action="/item/{{$item->id}}" class="comment__form" method="post">
                        @csrf
                        <div class="input__group">
                            <textarea name="comment" class="input__group--txt">{{old('comment')}}</textarea>
                        </div>
                        <div class="button__group">
                            <button class="button__group--submit" name="comment_btn" type="submit">コメントを送信する</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection